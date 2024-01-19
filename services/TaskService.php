<?php

namespace app\services;

use Yii;
use yii\db\Command;
use yii\data\Pagination;
use yii\validators\DateValidator;


class TaskService
{
    private static $pageSize = 5;      //notes per page

    public static function processTaskData($startDate, $endDate, $page = 1, $customPageSize = null)
    {
        $pageSize = $customPageSize ?: self::$pageSize;

        $errorMsg = self::validateDateInterval($startDate, $endDate);

        if ($errorMsg) {
            return [
                'errorMsg' => $errorMsg,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ];
        }

        if ($startDate && $endDate) {
            Yii::$app->session['datesInterval'] = [
                'startDate' => $startDate,
                'endDate' => $endDate,
            ];
        }

        $result = self::executeQuery($page, $pageSize);

        return $result;
    }

    private static function validateDateInterval($startDate, $endDate)
    {
        if ($startDate && $endDate) {
            $dateValidator = new DateValidator(['format' => 'php:Y-m-d']);

            if (!$dateValidator->validate($startDate) || !$dateValidator->validate($endDate)) {
                return 'невірний формат дати, перевірте дату';
            } elseif (strtotime($endDate) < strtotime($startDate)) {
                return 'кінцева дата має бути більшою або такою ж як і початкова';
            }
        }

        return null;
    }

    private static function executeQuery($page, $pageSize)
    {
        $db = Yii::$app->db;
        $command = new Command(['db' => $db]);

        $datesInterval = Yii::$app->session['datesInterval'];
        $sql = "
            SELECT
                users.name AS 'user_name',
                COUNT(
                    CASE
                        WHEN task.category_id = 1 THEN 1
                        ELSE NULL
                    END
                ) AS 'category1_count',
                COUNT(
                    CASE
                        WHEN task.category_id = 2 THEN 1
                        ELSE NULL
                    END
                ) AS 'category2_count',
                COUNT(
                    CASE
                        WHEN task.category_id = 3 THEN 1
                        ELSE NULL
                    END
                ) AS 'category3_count',
                COUNT(
                    CASE
                        WHEN task.category_id = 4 THEN 1
                        ELSE NULL
                    END
                ) AS 'category4_count',
                COUNT(
                    CASE
                        WHEN task.category_id IS NOT NULL THEN 1
                        ELSE NULL
                    END
                ) AS 'row_summ'
            FROM tasks AS task
                LEFT JOIN users ON task.in_work_user_id = users.id
            WHERE
                task.completed_at >= '{$datesInterval['startDate']}'
                AND task.completed_at <= '{$datesInterval['endDate']}'
            GROUP BY task.in_work_user_id, users.name
        ";

        $command->setSql($sql);
        $totalCount = count($command->queryAll());

        $pagination = new Pagination([
            'totalCount' => $totalCount,
            'pageSize' => $pageSize,
        ]);

        $pagination->setPage($page - 1);

        $sql .= " LIMIT {$pagination->limit} OFFSET {$pagination->offset}";
        $command->setSql($sql);

        $result = $command->queryAll();

        return [
            'rows' => $result,
            'pagination' => $pagination,
            'startDate' => $datesInterval['startDate'],
            'endDate' => $datesInterval['endDate'],
        ];
    }
}