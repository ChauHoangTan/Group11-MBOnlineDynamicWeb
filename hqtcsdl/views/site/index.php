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
				<select class="form-select "style="width:15% ;height:40px" onchange="location = this.value;">
					
					<option value="index">Ngẫu nhiên</option>
					<option value="decrease">Giá tăng dần</option>
					<option value="increase">Gia giảm dần</option>
				</select>
			</div>
			<div class="row justify-content-center align-items-center g-2">
				
					<?php
					
    foreach ($products as $product) {
        echo '<div class="col-3 body-text card p-2 product-item">';
        echo '<a href="productdetail?id=' . $product->ID_PROC. '"';
        echo '	class=" "> <img src="' . $url . 'image/'.$product->img.'"';
        echo '	class="card-img-top " alt="..."></a>';
        echo '<div class="card-body">';
        echo '	<a href="#" class="card-title body-text h5">' . $product->NAME_PROC . '</a>';
        echo '	<div class="text-secondary h3">' . currency_format($product->PRICE) . '</div>';
        echo '	<div>';
        echo '	<i class="fa fa-star checked"></i> <i class="fa fa-star checked"></i>';
        echo '		<i class="fa fa-star checked"></i> <i class="fa fa-star checked"></i>';
        echo '		<i class="fa fa-star"></i>';
        echo '	</div>';
        echo '	<div class="d-flex p-2">';
        echo '		<a class="btn btn-secondary me-1" href=#>Mua ngay</a> <button';
        echo '	class="btn btn-warning ms-1" onclick="' . 'addProductToCart(' . trim($product->NAME_PROC) . ')">Thêm vào <i';
        echo '			class="fa-solid fa-cart-shopping"></i></button>';
        echo '	</div></div> </div>';
    }
    ?>
					
				
	
	</div>
			<div class="d-flex justify-content-center align-items-center ">
				<a class="btn btn-light pt-2 mt-4 w-25"
					href="<?php echo  $url.$controllerId.'/index?amount='.(count($products)+8)?>">
					Xem thêm 8 sản phẩm <i class="fa-solid fa-arrow-down"></i>
				</a>	
			</div>
		</section>
	</div>
</body>
<script>var html = <?= Json::encode( $products);?>;
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