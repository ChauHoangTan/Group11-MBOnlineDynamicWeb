<?php
use app\assets\AppAsset;
use app\modules\admin\controllers\ProductController;
use app\modules\admin\controllers\ProductdetailController;
use yii\helpers\Json;
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var ProductController x */
/** @var ProductdetailController $productdetails */
$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php
/* @var $this yii\web\View */

$url = Yii::$app->homeUrl;
$controllerId = Yii::$app->controller->id;

$this->registerCssFile(Yii::$app->homeUrl . "css/font-awesome/css/all.min.css  ");

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

</head>
<body>
<?php


?>

<div class='site-about container-fluid'>
		<main class="container">
			<div class="row">

				<div class="col-7">
					<div id="productId" class="carousel slide" data-bs-ride="carousel">

						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img src="<?php echo $url?>image/<?= $product->img  ?>"
									class=" m-3 py-3" alt="First slide">
							</div>
						</div>
					</div>

					<div
						class="container d-flex justify-content-around align-items-center my-3">

						<div class="row d-flex justify-content-around align-items-center ">
							<div class="btn col field">
								<i class="fas fa-medal fs-1 "></i>
								<p>Nổi bật</p>
							</div>

							<div class="btn col field">
								<img src="<?php echo $url?>image/redmiNote8Pro1.jpg"
									class="w-100 d-block" alt="">
								<p>Màu xanh lá</p>
							</div>
							<div class=" btn col field">
								<img src="<?php echo $url?>image/redmiNote8Pro2.jpg"
									class="w-100 d-block" alt="">
								<p>Màu đen</p>
							</div>
							<div class="btn col  field">
								<img src="<?php echo $url?>image/redmiNote8Pro3.jpg"
									class="w-100 d-block" alt="">
								<p>Xanh dương</p>
							</div>
							<div class="btn col field">
								<i class="far fa-newspaper fs-1 my-3"></i>
								<p>Thông tin sản phẩm</p>
							</div>



						</div>

					</div>

					<button class="w-100 btn btn-brand btn-warning">Mua ngay</button>
				</div>

				<div class="col-5">
					<div class="container GB my-3">
						<button class="btn btn-outline-primary active mr-1">4 GB</button>
						<button class="btn btn-outline-primary mx-1">8 GB</button>
						<button class="btn btn-outline-primary mx-1">16 GB</button>
					</div>

					<div class="container color my-3">
						<button class="btn btn-outline-primary active mr-1">Xanh lá</button>
						<button class="btn btn-outline-primary mx-1">Xanh dương</button>
						<button class="btn btn-outline-primary mx-1">Màu đen</button>
					</div>

					<div class="container buyAt my-3">
						<span>Giá tại : </span>
						<!--  Modal trigger button  -->
						<button type="button" class="btn btn-warning"
							data-bs-toggle="modal" data-bs-target="#productModal">
							Thành phố Hồ Chí Minh
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
								fill="currentColor" class="bi bi-caret-down-fill"
								viewBox="0 0 16 16">
                        <path
									d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                      </svg>
						</button>

						<!-- Modal Body-->
						<div class="modal fade" id="productModal" tabindex="-1"
							role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalTitleId">Chọn tỉnh/Thành phố</h5>
										<button type="button" class="btn-close"
											data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="container-fluid">Add rows here</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Đóng</button>
										<button type="button" class="btn btn-primary">Chọn</button>
									</div>
								</div>
							</div>
						</div>





					</div>

					<div class="border border-1 border-info rounded-2 my-3 py-3">
						<div
							class="d-flex flex-column justify-content-center align-items-center">

							<div>
								<span class="oldPrice fst-italic text-decoration-line-through">
									6.999.000đ </span> <span class="discount mx-2 fw-bold">-15%</span>
							</div>


							<div>
								<div class="newPrice fw-bold text-danger">5.499.000đ</div>
							</div>
						</div>


						<div class="bonus border border-1 rounded-2 border-warning">
							<div class="bg-light rounded-2">
								<div class=" p-2 ">
									<div class=" fw-bold ">Khuyến mãi</div>
									<div>
										Dự kiến khuyến mãi cho đến hết ngày <span id="dateBonus"></span>
									</div>
								</div>
							</div>

							<ol class="promotion">
								<li>Phiếu mua hàng trị giá 50.000đ áp dụng mua sim</li>
								<li>Giảm thêm 2% khi mua cùng sản phẩm bất kỳ có giá cao hơn</li>
								<li>Cơ hội trúng 2023 chỉ vàng (trị giá 5.5 triệu/giải).</li>
								<li>Giảm 15% gói Bảo hành Mở rộng 12 tháng</li>
								<li>Giảm 10% gói Bảo hiểm rơi vỡ 6 tháng</li>
								<li>Tặng suất mua Laptop giảm thêm 2,000,000đ (áp dụng tùy sản
									phẩm)</li>
							</ol>

							<div class="bg-light rounded-2">
								<div class=" p-2 ">
									<div class=" fw-bold ">Quà tặng kèm</div>
									<div>Áp dụng khi mua sản phẩm !</div>
								</div>
							</div>

							<ol class="present">
								<li>Tặng thêm tai nghe bluetooth trị giá 400.000đ</li>
								<li>Đồng hồ Apple Watch thể thao siêu chất</li>
								<li>Giảm thêm 100.000đ nếu mua thêm phụ kiện kèm theo</li>
								<li>Tặng thêm kính cường lực và ốp lưng, có nhiều loại màu cho
									người dùng tùy chọn!</li>
							</ol>

						</div>
					</div>



				</div>

			</div>

			<div class="container">
				<!-- Nav tabs -->
				<ul
					class="nav nav-tabs d-flex justify-content-around align-items-center"
					id="productDetailsTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="info-tab" data-bs-toggle="tab"
							data-bs-target="#infomation" type="button" role="tab"
							aria-controls="info" aria-selected="true">Thông tin sản phẩm</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="speci-tab" data-bs-toggle="tab"
							data-bs-target="#specifications" type="button" role="tab"
							aria-controls="speci" aria-selected="false">Thông số kỹ thuật</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="rating-tab" data-bs-toggle="tab"
							data-bs-target="#rating" type="button" role="tab"
							aria-controls="rating" aria-selected="false">Đánh giá từ người
							dùng</button>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content ">
					<div class="tab-pane active" id="infomation" role="tabpanel"
						aria-labelledby="info-tab">

						<div class="container my-4 w-75">
							<div>
								<span class="productName h5"><?= $product->NAME_PROC ?> 4GB/64GB</span>
								là chiếc smartphone tầm trung, chiếc máy này gây ấn tượng với
								cấu hình phần cứng mạnh mẽ, hệ thống 4 camera sau chất lượng và
								đi kèm giá bán cực kỳ hấp dẫn.
							</div>


							<ol class="my-3 featureDetails">
								<div class="fw-bold">Với các tính năng như :</div>
								<li>Ảnh chụp chất lượng cực cao, rõ nét</li>
								<li>Đi đầu về thiết kế, cầm nắm vừa vặn thoải mái</li>
								<li>Hiệu suất xử lý mạnh mẽ</li>
								<li>Hạn chế ánh sáng xanh, tránh gây hại cho mắt khi xử dụng lâu</li>

								<div class="container d-flex justify-content-center my-5">
									<img
										src="<?php echo $url?>image/ProductImage/<?php echo $img[0]->IMG_PATH?>"
										alt="">
								</div>

							</ol>

							<div>
								<p class="fw-bold">4 Camera chất lượng hàng đầu :</p>
								<p>
									Không chỉ có 2 hay 3 camera mà với chiếc smartphone mới <span
										class="productName h5"><?= $product->NAME_PROC ?></span> thì
									người dùng sẽ có tới 4 camera để thỏa mãn nhu cầu chụp ảnh của
									mình.
								</p>
								<div class="container d-flex justify-content-center my-5">
									<img
										src="<?php echo $url?>image/ProductImage/<?php echo $img[1]->IMG_PATH?>"
										alt="">
								</div>
							</div>
						</div>



					</div>
					<div class="tab-pane" id="specifications" role="tabpanel"
						aria-labelledby="speci-tab">
						<div class="container my-4 w-50">
							<div class="d-flex justify-content-center">
								<img
									src="<?php echo $url?>image/ProductImage/<?php echo $img[2]->IMG_PATH?>"
									alt="">
							</div>

							<div class="monitor my-3">
								<div class="bg-light p-2 border rounded-2 fw-bold text-primary">Màn
									hình</div>
								<ul>


									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Công nghệ màng hình :</div>
											<div class="col-7"><?= $productdetails->SCREEN_TECH?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Độ phân giải :</div>
											<div class="col-7"><?= $productdetails->RESOLUTION?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Màng hình rộng :</div>
											<div class="col-7"><?= $productdetails->SREEN_SIZE?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Độ sáng tối đa :</div>
											<div class="col-7"><?= $productdetails->MAX_BRIGHTNESS?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Mặt kính cảm ứng :</div>
											<div class="col-7"><?= $productdetails->SCREEN_SENSOR?></div>

										</div>
									</li>

								</ul>

							</div>

							<div class="cameraAf my-3">
								<div class="bg-light p-2 border rounded-2 fw-bold text-primary">Camera
									sau</div>

								<ul>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Độ phân giải :</div>
											<div class="col-7"><?= $productdetails->F_CAM_RESOLUTION?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Quay phim :</div>
											<div class="col-7"><?= $productdetails->F_CAM_FILM?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Đèn Flash :</div>
											<div class="col-7"><?= $productdetails->F_CAM_FLASH?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Tính năng :</div>
											<div class="col-7"><?= $productdetails->F_CAM_FEATURE?></div>

										</div>
									</li>
								</ul>
							</div>

							<div class="cameraBe my-3">
								<div class="bg-light p-2 border rounded-2 fw-bold text-primary">Camera
									trước</div>

								<ul>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Độ phân giải :</div>
											<div class="col-7"><?= $productdetails->B_CAM_RESOLUTION?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Tính năng :</div>
											<div class="col-7"><?= $productdetails->B_CAM_FEATURE?></div>
										</div>
									</li>
								</ul>
							</div>

							<div class="operatingSystem my-3">
								<div class="bg-light p-2 border rounded-2 fw-bold text-primary">Hệ
									điều hành & CPU</div>

								<ul>


									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Hệ điều hành :</div>
											<div class="col-7"><?= $productdetails->OS?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Chíp xử lý (CPU) :</div>
											<div class="col-7"><?= $productdetails->CPU?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Tốc độ CPU :</div>
											<div class="col-7"><?= $productdetails->CPU_SPEED?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Chíp đồ họa (GPU) :</div>
											<div class="col-7"><?= $productdetails->GPU?></div>

										</div>
									</li>



								</ul>
							</div>

							<div class="memory my-3">
								<div class="bg-light p-2 border rounded-2 fw-bold text-primary">Bộ
									nhớ & Lưu trữ</div>

								<ul>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Ram :</div>
											<div class="col-7"><?= $productdetails->RAM?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Dung lượng lưu trữ :</div>
											<div class="col-7"><?= $productdetails->ROM?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Dung lượng còn lại (khả dụng) khoảng :</div>
											<div class="col-7"><?= $productdetails->ROM_AVB?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Thẻ nhớ :</div>
											<div class="col-7"><?= $productdetails->MEMORY_CARD?></div>

										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Danh bạ :</div>
											<div class="col-7"><?= $productdetails->PHONEBOOK?></div>

										</div>
									</li>
								</ul>
							</div>

							<div class="charge my-3">
								<div class="bg-light p-2 border rounded-2 fw-bold text-primary">Dung
									lượng Pin/Sạc</div>

								<ul>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Dung lượng pin :</div>
											<div class="col-7"><?= $productdetails->BATTERY_CAPACITY?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Loại pin :</div>
											<div class="col-7"><?= $productdetails->BATTERY_TYPE?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Hỗ trợ sạc tối đa :</div>
											<div class="col-7"><?= $productdetails->MAX_CHARGE?></div>
										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Sạc kèm theo máy :</div>
											<div class="col-7"><?= $productdetails->CHARGER_INCLUDED?></div>

										</div>
									</li>

									<li>
										<div class="row justify-content-center align-items-center g-2">
											<div class="col-5">Công nghệ Pin :</div>
											<div class="col-7"><?= $productdetails->BATTERY_FEATURE?></div>

										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="rating" role="tabpanel"
						aria-labelledby="rating-tab">
						<div
							class="w-75 my-4 container border border-2 rounded-2 border-light">
							<div class="fw-bold">
								Đánh giá điện thoại <span class="productName h5"><?= $product->NAME_PROC ?> 4GB/64GB</span>
							</div>

							<div class="text-warning">
								<span class="fw-bold fs-4">4.5</span> <i class="fas fa-star"></i>
								<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
									class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i> <span
									class="mx-3 text-dark text-decoration-underline fst-italic">
									345 người đánh giá</span>

								<div class="mt-2 boder border-4 border-danger">
									<span class="">5 <i class="fas fa-star"></i>
										<div class="d-inline-block line bg-black">
											<p class="bg-warning" style="width: 31%; height: 100%;"></p>
										</div>
									</span> <span class="text-primary fw-bold">31%</span>

								</div>
								<div>

									<span class="">4 <i class="fas fa-star"></i>
										<div class="d-inline-block line bg-black">
											<p class="bg-warning" style="width: 31%; height: 100%;"></p>
										</div>
									</span> <span class="text-primary fw-bold">31%</span>
								</div>
								<div>
									<span class="">3 <i class="fas fa-star"></i>
										<div class="d-inline-block line bg-black">
											<p class="bg-warning" style="width: 31%; height: 100%;"></p>
										</div>
									</span> <span class="text-primary fw-bold">31%</span>
								</div>
								<div>
									<span class="">2 <i class="fas fa-star"></i>
										<div class="d-inline-block line bg-black">
											<p class="bg-warning" style="width: 31%; height: 100%;"></p>
										</div>
									</span> <span class="text-primary fw-bold">31%</span>
								</div>
								<div>
									<span class="">1 <i class="fas fa-star"></i>
										<div class="d-inline-block line bg-black">
											<p class="bg-warning" style="width: 31%; height: 100%;"></p>
										</div>
									</span> <span class="text-primary fw-bold">31%</span>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>



			<section class="container-fluid p-4 section-bg rounded my-5">
			<div class="d-flex justify-content-between p-2 ">
				<h1 class="text-light">CÓ THỂ BẠN CŨNG THÍCH</h1>
			</div>
			<div id="content"
				class="">
			<?php echo $listproduct?>
			</div>
		</section>


		</main>
	</div>

</body>
<script>

	
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