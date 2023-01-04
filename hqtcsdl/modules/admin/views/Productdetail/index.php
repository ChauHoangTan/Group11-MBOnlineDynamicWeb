<?php

use app\models\Productdetail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductdetailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Productdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Productdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_D_PROC',
            'DESCRIBE_PROC:ntext',
            'SOLD',
            'TOTAL_NUMBER',
            'ID_PROC',
            //'SCREEN_TECH',
            //'RESOLUTION',
            //'SREEN_SIZE',
            //'MAX_BRIGHTNESS',
            //'SCREEN_SENSOR',
            //'F_CAM_RESOLUTION',
            //'F_CAM_FILM',
            //'F_CAM_FLASH',
            //'F_CAM_FEATURE',
            //'B_CAM_RESOLUTION',
            //'B_CAM_FEATURE',
            //'OS',
            //'CPU',
            //'CPU_SPEED',
            //'GPU',
            //'RAM',
            //'ROM',
            //'ROM_AVB',
            //'MEMORY_CARD',
            //'PHONEBOOK',
            //'BATTERY_CAPACITY',
            //'BATTERY_TYPE',
            //'MAX_CHARGE',
            //'CHARGER_INCLUDED',
            //'BATTERY_FEATURE',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Productdetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID_D_PROC' => $model->ID_D_PROC]);
                 }
            ],
        ],
    ]); ?>


</div>
