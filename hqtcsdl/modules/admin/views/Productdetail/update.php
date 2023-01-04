<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Productdetail $model */

$this->title = 'Update Productdetail: ' . $model->ID_D_PROC;
$this->params['breadcrumbs'][] = ['label' => 'Productdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_D_PROC, 'url' => ['view', 'ID_D_PROC' => $model->ID_D_PROC]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
