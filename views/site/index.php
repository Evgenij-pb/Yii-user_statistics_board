<?php

/** @var yii\web\View $this */

$this->title = 'Статистика відпрацьованих заявок';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">

        <form method="post" action="/?r=task/index">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
            <p class="fs-3">Статистика відпрацьованих заявок за період</p>
            <input type="date" name="startdate" value="<?= date("Y-m-");?>01" />
            -
            <input type="date" name="enddate" value="<?= date("Y-m-d");?>" />
            &nbsp;
            <input class="btn btn-primary" type="submit" value="Отримати">
        </form>

    </div>

</div>
