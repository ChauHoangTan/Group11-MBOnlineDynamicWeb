<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Productdetail $model */

$this->title = $model->ID_D_PROC;
$this->params['breadcrumbs'][] = ['label' => 'Productdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_D_PROC' => $model->ID_D_PROC], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_D_PROC' => $model->ID_D_PROC], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_D_PROC',
            'DESCRIBE_PROC:ntext',
            'SOLD',
            'TOTAL_NUMBER',
            'ID_PROC',
            'SCREEN_TECH',
            'RESOLUTION',
            'SREEN_SIZE',
            'MAX_BRIGHTNESS',
            'SCREEN_SENSOR',
            'F_CAM_RESOLUTION',
            'F_CAM_FILM',
            'F_CAM_FLASH',
            'F_CAM_FEATURE',
            'B_CAM_RESOLUTION',
            'B_CAM_FEATURE',
            'OS',
            'CPU',
            'CPU_SPEED',
            'GPU',
            'RAM',
            'ROM',
            'ROM_AVB',
            'MEMORY_CARD',
            'PHONEBOOK',
            'BATTERY_CAPACITY',
            'BATTERY_TYPE',
            'MAX_CHARGE',
            'CHARGER_INCLUDED',
            'BATTERY_FEATURE',
        ],
    ]) ?>

</div>
