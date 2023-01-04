<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Productdetail $model */

$this->title = 'Create Productdetail';
$this->params['breadcrumbs'][] = ['label' => 'Productdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
