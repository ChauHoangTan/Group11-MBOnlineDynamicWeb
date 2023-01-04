<?php
use app\assets\AppAsset;
use app\modules\admin\controllers\MonanController;

use yii\helpers\Json;
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var MonanController $monannoibats */

$this->title = 'Trang chủ';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php
/* @var $this yii\web\View */

$this->registerJsFile(Yii::$app->homeUrl . "js/index.js", [
    'depends' => [
        AppAsset::class
    ],
    'position' => \yii\web\View::POS_END
]);

$url = Yii::$app->homeUrl;
$controllerId = Yii::$app->controller->id;
$this->registerCssFile(Yii::$app->homeUrl . "css/index.css");
$this->registerCssFile(Yii::$app->homeUrl . "css/font-awesome/css/all.min.css  ");
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

</head>
<body>
<?php

function currency_format($number, $suffix = 'đ')
{
    if (! empty($number)) {
        return number_format($number, 0, ',', '.') . "{$suffix}";
    }
}
?>

<div class='site-about container-fluid'>
	</div>
	<?php echo print_r($productdetails ).'<br>'.$productdetails->CPU?>
</body>
<script>var html = <?= Json::encode( $productdetails);?>;
//alert(html);
	
</script>
<script
	src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
	integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
	crossorigin="anonymous">
        </script>

<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
	integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
	crossorigin="anonymous">
        </script>