<?php
use app\assets\AppAsset;
use app\modules\admin\controllers\MonanController;

use yii\helpers\Json;
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var MonanController $monannoibats */

$this->title = 'Trang chủ';

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

<div class='site-about container-fluid ' style="margin-top:75px">
		<section class="container-fluid">
			<div id="carouselExampleControls" class="carousel slide"
				data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="<?php echo $url?>image/Banner1.jpg"
							class="d-block rounded-2 w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="<?php echo $url?>image/Banner2.jpg"
							class="d-block rounded-2 w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="<?php echo $url?>image/Banner3.jpg"
							class="d-block rounded-2 w-100" alt="...">
					</div>
				</div>
				<button class="carousel-control-prev" type="button"
					data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button"
					data-bs-target="#carouselExampleControls" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</section>

		<section class="container-fluid p-4 section-bg rounded my-5">
			<div class="d-flex justify-content-between p-2 ">
				<h1 class="text-light">SẢN PHẨM NỔI BẬT</h1>
				<select class="form-select " style="width: 15%; height: 40px" id="myselect"
					onchange="sortProductbyPrice()">

					<option selected value="">Sắp xếp theo</option>
					<option value="SORT_DESC">Giá tăng dần</option>
					<option value="SORT_ASC">Giá giảm dần</option>
				</select>
			</div>
			<div id="content"
				class="">
			
			</div>
		</section>
	</div>
</body>
<script>var html = <?= Json::encode( Yii::$app->session['amount']);?>;
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