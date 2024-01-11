<?php

namespace app\controllers;

use app\models\Task;
use Yii;
use yii\db\Command;


class TaskController extends \yii\web\Controller
{
    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $startdate = $request->post('startdate');
        $enddate = $request->post('enddate');

// Создаем объект подключения к базе данных
        $db = Yii::$app->db;

// Создайте объект команды
        $command = new Command(['db' => $db]);

// SQL-запрос
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
        task.completed_at >= '$startdate'
        AND task.completed_at <= '$enddate'
    GROUP BY task.in_work_user_id, users.name;
";

// Устанавливаем SQL-запрос
        $command->setSql($sql);

// Выполняем запрос
        $result = $command->queryAll();

//переходим на страницу с результатом
        return $this->render('task',['rows'=> $result]);

    }

}
