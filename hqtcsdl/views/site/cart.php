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
</head>
<body>
	<div class="col-md-8 "
		style="margin-left: 15%; background-color: while !important">
		<!--================Cart Area =================-->

		<section class="cart_area">
			<div class="container">
				<div class="cart_inner">
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
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
            echo '</div>' . '</div>' . '</td>' . '<td>' . '<h5 id="price' . $product['id'] . '">' . currency_format($product['price']) . '</h5>' . '</td>' . '<td>' . '<div class="product_count">' . '<input type="text" name="qty" id="amount' . $product['id'] . '" maxlength="12" value="' . $product['amount'] . '" title="Quantity:" class="input-text qty">';
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
					<form action='order-product'>
						<div style="margin-bottom: 30px">THÔNG TIN KHÁCH HÀNG</div>
						<div class="row">
							<div class="col-6 col-md-4 ">

								<div class="form-outline ">
									<label class="form-label">HỌ VÀ TÊN</label> <input type="text"
										class="form-control" name="name" required autocomplete="off">
								</div>

							</div>
							<div class="col-6 col-md-6 ">
								<div class="form-outline ">
									<label class="form-label">Email</label> <input type="email"
										class="form-control" required name="email" autocomplete="off">
								</div>
							</div>

							<div class="col-md-7 my-3  ">
								<div class="form-outline ">
									<label class="form-label">Số nhà, tên đường</label> <input
										type="text" class="form-control" id="address" name="address"
										required autocomplete="off">
								</div>
							</div>
						</div>
						<hr width="100%">
						<div style="margin-bottom: 30px">THÔNG TIN ĐƠN HÀNG</div>

						<div class="row ">


							<div class="col">TỔNG TIỀN</div>
							<h4 class="col" id="totalPrice">
						
					<?php
    $total = 0;
    if ($products != "") {
        foreach ($products as $product) {
            $total += $product['price'] * $product['amount'];
        }
    }
    echo currency_format($total);
    ?>
					</h4>
						</div>

						<button class="btn-lg d-block btn-warning "
							style="width: 100%; margin-top: 60px" id="orderProduct">THANH
							TOÁN</button>
					</form>
				</div>

			</div>



		</section>

	</div>

	<script>
var html = <?=Json::encode($products);?>;
var totalPrice=<?=Json::encode($total) ?>
</script>
</body>
</html>


