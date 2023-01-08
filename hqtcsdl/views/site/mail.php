<?php
use app\assets\AppAsset;
use app\controllers\SiteController;
use yii\helpers\Json;
/** @var yii\web\View $this */
/** @var SiteController $products*/

$this->title = 'Giỏ hàng';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php

$url = Yii::$app->homeUrl;
$controllerId = Yii::$app->controller->id;
/* @var $this yii\web\View */
$this->registerJsFile(Yii::$app->homeUrl . "js/main.js", [
    'depends' => [
        AppAsset::class
    ],
    'position' => \yii\web\View::POS_END
]);
$this->registerJsFile(Yii::$app->homeUrl . "js/cart.js", [
    'depends' => [
        AppAsset::class
    ],
    'position' => \yii\web\View::POS_END
]);
$this->registerJsFile(Yii::$app->homeUrl . "js/mobileweb.js", [
    'depends' => [
        AppAsset::class
    ],
    'position' => \yii\web\View::POS_END
]);

$this->registerCssFile(Yii::$app->homeUrl . "css/mobileweb.css");
$this->registerCssFile(Yii::$app->homeUrl . "css/cart.css");
$this->registerCssFile(Yii::$app->homeUrl . "css/font-awesome/css/all.min.css  ");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
	<div class="col-md-8 "
		style="margin-left: 15%; background-color: while !important">
		<!--================Cart Area =================-->

		<section class="cart_area">
			<div class="container">
			<h1 style="color: blue"> Bạn vừa xác nhận thanh toán một đơn hàng như sau: </h1>
				<div class="cart_inner">
					<div class="table-responsive">
						<table class="table table-striped table-bordered" style="  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;;
    margin-bottom: 1rem;
    color: #212529;">
							<thead>
								<tr>
									<th scope="col">Sản phẩm</th>
									<th scope="col">Giá</th>
									<th scope="col">Số lượng</th>
									<th scope="col">Tổng tiền</th>
								</tr>
							</thead>
							<tbody>
						<?php

    function currency_format($number, $suffix = '₫')
    {
        if (! empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    if ($session != "" && $products != "") {
        foreach ($products as $product) {
            echo '<tr><td><div class="media"><div class="d-flex">';
            echo '<img src="' . $url . '/image/' . $product['image'] . '" alt="" width="80px">';
            echo '</div>';
            echo '<div class="media-body">';
            echo '<p class=" ">' . $product['name'] . '</p>';
            echo '</div>' . '</div>' . '</td>' . '<td>' . '<h5 id="price' . $product['id'] . '">' . currency_format($product['price']) . '</h5>' . '</td>' . '<td>' . '<div class="product_count">' ;
            echo '<span>' . $product['amount'] . '</span>';
            echo '<button onclick="plusAmount(' . $product['id'] . ')" class="increase items-count" type="button"><i class="fa-solid fa-chevron-up"></i></button>
              <button onclick="subAmount(' . $product['id'] . ')" class="reduced items-count" type="button"><i class="fa-solid fa-chevron-down"></i></button>';
            echo ' </div>' . '</td>' . '<td>' . '<h5 id ="total' . $product['id'] . '">' . currency_format($product['price'] * $product['amount']) . '</h5>' . '</td>' . '</tr>';
        }
    }
    ?>
    
						</tbody>

						</table>
					</div>
					<hr width="100%">
					<div>Vui lòng giữ liên lạc khi nhận cuộc gọi liên lạc với chúng tôi sản phẩm sẽ đến sau 10 ngày</div>
				<h4 style="color: blue">Cảm ơn bạn đã sữ dung dịch vụ của chúng tôi, chúc các bạn có nhiều sức khỏe</h4>
				</div>

			</div>



		</section>

	</div>

	<script>
</script>
</body>
</html>


