<?php

namespace app\controllers;

use app\models\Task;
use Yii;
use app\services\TaskService;


class TaskController extends \yii\web\Controller
{

    public function actionIndex()
    {

        $request = Yii::$app->request;
        $startDate = $request->post('startdate');
        $endDate = $request->post('enddate');
        $page = $request->get('page', 1);

        $result = TaskService::processTaskData($startDate, $endDate, $page);

        if (isset($result['errorMsg'])) {
            return $this->render('task', $result);
        }

        return $this->render('task', $result);

    }
}