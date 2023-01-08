<?php

/** @var yii\web\View $this */
/** @var string $content */
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>

<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php
    $url = Yii::$app->homeUrl;
    $controllerId = Yii::$app->controller->id;
    $this->head();
    $this->registerJsFile(Yii::$app->homeUrl . "js/main.js", [
        'depends' => [
            AppAsset::class
        ],
        'position' => \yii\web\View::POS_END
    ]);
    $this->registerCssFile(Yii::$app->homeUrl . "css/font-awesome/css/all.min.css");
    $this->registerCssFile(Yii::$app->homeUrl . "css/main.css");
    $this->registerCssFile(Yii::$app->homeUrl . "css/style.css");
    $this->registerCssFile(Yii::$app->homeUrl . "css/index.css");
    $this->registerCssFile("https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css");

    $this->registerLinkTag([
        'rel' => 'icon',
        'type' => 'image/png',
        'href' => $url . 'image/logo2.png'
    ]);
    ?>
    <script type="text/javascript">
		var baseUrl = "<?= Yii::$app->homeUrl ?>";
		var controllerId = "<?= Yii::$app->controller->id ?>";
		
    </script>


</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => '<img src=" ' . $url . '/image/logo.png" width="40px">',
        'brandUrl' => Yii::$app->homeUrl . Yii::$app->controller->id,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top '
        ]
    ]);
    // echo Yii::$app->session['username'];
    $amount =(isset(Yii::$app->session['cart'])) ? count( Yii::$app->session['cart']):'';
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav d-flex',
            'style' => 'padding-left:20%;justify-content: center;  gap: 10px;;align-items: center;'
        ],
        'items' => [
            [
                'label' => 'Home',
                'url' => [
                    '/site/index'
                ]
            ],
            [
                'label' => 'Quản lí',
                'url' => [
                    '/admin/'
                ]
            ],
            [
                'label' => 'Contact',
                'url' => [
                    '/site/contact'
                ]
            ],
            [
                'label' => '<i class="fa-solid fa-cart-shopping"></i><sup class="m-1" id= "cartAmount">'. $amount.'</sup>',
                'class' => 'cart ',
                'url' => [
                    '/site/cart'
                ]
            ],
            [
                'label' => '<form class="form-inline d-flex ">
                        <input class="form-control  m-0 dotrounded-left" type="search"
                            placeholder="Search... " aria-label="Search">
                        <button class="btn btn-navItem m-0 my-2 my-sm-0 dotrounded-right"
                            type="submit"><i class="fas fa-search"></i></button>
                    </form>',
                'class' => 'cart '
            ],
            Yii::$app->user->isGuest ? ([
                'label' => '<span class="btn btn-navItem  ">Login</span>',
                'class' => 'login ',
                'url' => [
                    '/site/login'
                ]
            ]) : ('<li>' . Html::beginForm([
                '/site/logout'
            ], 'post') . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', [
                'class' => 'btn btn-navItem'
            ]) . Html::endForm() . '</li>')
        ]
    ]);
    ?>
</header>

	<main role="main" class="flex-shrink-0">
		<div class="container">
        <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	</main>

	<footer class="footer-32892 pb-0">

		<div class="container">
			<div class="row">
				<div class="col-md  mb-4 mb-md-0">
					<h3>Thông tin chúng tôi</h3>
					<p class="mb-4">Chính sách bảo mật này nhằm mục đích giúp bạn hiểu
						rõ những thông tin chúng tôi thu thập, lý do chúng tôi thu thập và
						cách bạn có thể cập nhật, quản lý, xuất và xóa thông tin của mình.</p>
					<ul class="list-unstyled quick-info mb-4">
						<li><a href="#" class="d-flex align-items-center"> <i
								class="fa-solid fa-phone mx-3"></i> 1 291 3912 329
						</a></li>
						<li><a href="#" class="d-flex align-items-center"> <i
								class="fa-solid fa-envelope  mx-3"></i> fit.hcmus@gmail.com
						</a></li>
					</ul>

				</div>
				<div class="col-md mb-4 mb-md-0">
					<h3>Giới thiệu</h3>
					<ul class="list-unstyled tweets">
						<li class="d-flex">
							<div class="mr-4">
								<span class="icon icon-twitter"></span>
							</div>
							<div>Chúng tôi phát triển một loạt các dịch vụ giúp hàng triệu
								người hàng ngày khám phá và tương tác với thế giới theo những
								cách mới. Các dịch vụ của chúng tôi gồm có.</div>
						</li>
						<li class="d-flex">
							<div class="mr-4">
								<span class="icon icon-twitter"></span>
							</div>
							<div>Các ứng dụng, trang web và thiết bị của Google, chẳng hạn
								như Tìm kiếm, YouTube và Google Home.</div>
						</li>
						<li class="d-flex">
							<div class="mr-4">
								<span class="icon icon-twitter"></span>
							</div>
							<div>Các sản phẩm tích hợp vào các ứng dụng và trang web của bên
								thứ ba, chẳng hạn như dịch vụ quảng cáo, phân tích và Google
								Maps đã nhúng</div>
						</li>
					</ul>
				</div>
				<div class="col-md-3 mb-4 mb-md-0">
					<h3>Nền tảng khác</h3>
					<div class="row gallery ">

						<div class="col-4 h1 m-1  ">
							<a href="#"><i class="btn-me fa-brands fa-google"></i></a>
						</div>
						<div class="col-4 h1 m-1 ">
							<a href="#"><i class=" btn-me fa-brands fa-google-play"></i></a>
						</div>
						<div class="col-4 h1 m-1">
							<a href="#"><i class="btn-me fa-brands fa-facebook"></i></a>
						</div>
						<div class="col-4 h1 m-1">
							<a href="#"><i class=" btn-me fa-brands fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer>

<?php $this->endBody() ?>



</body>
</html>
<?php $this->endPage() ?>
