<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Productdetail $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="productdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DESCRIBE_PROC')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SOLD')->textInput() ?>

    <?= $form->field($model, 'TOTAL_NUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_PROC')->textInput() ?>

    <?= $form->field($model, 'SCREEN_TECH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RESOLUTION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SREEN_SIZE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MAX_BRIGHTNESS')->textInput() ?>

    <?= $form->field($model, 'SCREEN_SENSOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F_CAM_RESOLUTION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F_CAM_FILM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F_CAM_FLASH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F_CAM_FEATURE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'B_CAM_RESOLUTION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'B_CAM_FEATURE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CPU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CPU_SPEED')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GPU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RAM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ROM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ROM_AVB')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MEMORY_CARD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHONEBOOK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BATTERY_CAPACITY')->textInput() ?>

    <?= $form->field($model, 'BATTERY_TYPE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MAX_CHARGE')->textInput() ?>

    <?= $form->field($model, 'CHARGER_INCLUDED')->textInput() ?>

    <?= $form->field($model, 'BATTERY_FEATURE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
