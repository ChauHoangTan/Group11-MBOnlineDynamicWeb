<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductdetailSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="productdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_D_PROC') ?>

    <?= $form->field($model, 'DESCRIBE_PROC') ?>

    <?= $form->field($model, 'SOLD') ?>

    <?= $form->field($model, 'TOTAL_NUMBER') ?>

    <?= $form->field($model, 'ID_PROC') ?>

    <?php // echo $form->field($model, 'SCREEN_TECH') ?>

    <?php // echo $form->field($model, 'RESOLUTION') ?>

    <?php // echo $form->field($model, 'SREEN_SIZE') ?>

    <?php // echo $form->field($model, 'MAX_BRIGHTNESS') ?>

    <?php // echo $form->field($model, 'SCREEN_SENSOR') ?>

    <?php // echo $form->field($model, 'F_CAM_RESOLUTION') ?>

    <?php // echo $form->field($model, 'F_CAM_FILM') ?>

    <?php // echo $form->field($model, 'F_CAM_FLASH') ?>

    <?php // echo $form->field($model, 'F_CAM_FEATURE') ?>

    <?php // echo $form->field($model, 'B_CAM_RESOLUTION') ?>

    <?php // echo $form->field($model, 'B_CAM_FEATURE') ?>

    <?php // echo $form->field($model, 'OS') ?>

    <?php // echo $form->field($model, 'CPU') ?>

    <?php // echo $form->field($model, 'CPU_SPEED') ?>

    <?php // echo $form->field($model, 'GPU') ?>

    <?php // echo $form->field($model, 'RAM') ?>

    <?php // echo $form->field($model, 'ROM') ?>

    <?php // echo $form->field($model, 'ROM_AVB') ?>

    <?php // echo $form->field($model, 'MEMORY_CARD') ?>

    <?php // echo $form->field($model, 'PHONEBOOK') ?>

    <?php // echo $form->field($model, 'BATTERY_CAPACITY') ?>

    <?php // echo $form->field($model, 'BATTERY_TYPE') ?>

    <?php // echo $form->field($model, 'MAX_CHARGE') ?>

    <?php // echo $form->field($model, 'CHARGER_INCLUDED') ?>

    <?php // echo $form->field($model, 'BATTERY_FEATURE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
