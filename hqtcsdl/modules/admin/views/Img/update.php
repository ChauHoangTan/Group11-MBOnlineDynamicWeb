<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Img $model */

$this->title = 'Update Img: ' . $model->ID_IMG;
$this->params['breadcrumbs'][] = ['label' => 'Imgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_IMG, 'url' => ['view', 'ID_IMG' => $model->ID_IMG]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="img-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
