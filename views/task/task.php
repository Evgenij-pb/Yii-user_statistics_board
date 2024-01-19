<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;


/** @var yii\web\View $this */

$this->title = 'Статистика відпрацьованих заявок';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">

        <form method="post" action="/?r=task/index">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
            <p class="fs-3">Статистика відпрацьованих заявок за період</p>
            <input type="date" name="startdate" value="<?= $startDate ?? date("Y-m-").'01'?>"/>
            -
            <input type="date" name="enddate" value="<?= $endDate ?? date("Y-m-d")?>"/>
            &nbsp;
            <input class="btn btn-primary" type="submit" value="Отримати">
        </form>

    </div>

    <?php if ($errorMsg): ?>

        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
            <div class="alert alert-primary" role="alert">
                <?= $errorMsg ?>
            </div>
        </div>

    <?php else: ?>

        <?php if (count($rows) > 0): ?>

            <table class="category-table">
                <thead>
                <tr>
                    <th>ФІО / Хто вирішив проблему</th>
                    <th>Відключення</th>
                    <th>Перевірка / сдешевлення</th>
                    <th>Технічне питання</th>
                    <th>Інше</th>
                    <th>Усього</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?= $row['user_name'] ?></td>
                        <td><?= $row['category1_count'] ?></td>
                        <td><?= $row['category2_count'] ?></td>
                        <td><?= $row['category3_count'] ?></td>
                        <td><?= $row['category4_count'] ?></td>
                        <td><?= $row['row_summ'] ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
                <p>for example 5 notes per page</p>
            </nav>

        <?php else: ?>

            <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                <div class="alert alert-success" role="alert">
                    нічого не знайдено
                </div>
            </div>

        <?php endif; ?>

    <?php endif; ?>



</div>








