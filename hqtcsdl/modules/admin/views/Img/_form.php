<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Img $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="img-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IMG_PATH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_PROC')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
