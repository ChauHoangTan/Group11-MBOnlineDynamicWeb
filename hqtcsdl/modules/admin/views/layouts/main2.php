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
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top '
        ]
    ]);
    // echo Yii::$app->session['username'];
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
                'label' => '??i???n tho???i',
                'url' => [
                    '/admin/product'
                ]
            ],
            [
                'label' => 'Chi ti???t ??i???n tho???i',
                'url' => [
                    '/admin/productdetail'
                ]
            ],

            Yii::$app->user->isGuest ? ([
                'label' => '<span class="btn btn-navItem">Login</span>',
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
		<div class="container w-100">
        <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	</main>

		<footer class="footer-32892 pb-0">

		<div class="container">
			<div class="row">
				<div class="col-md  mb-4 mb-md-0">
					<h3>Th??ng tin ch??ng t??i</h3>
					<p class="mb-4">Ch??nh s??ch b???o m???t n??y nh???m m???c ????ch gi??p b???n hi???u
						r?? nh???ng th??ng tin ch??ng t??i thu th???p, l?? do ch??ng t??i thu th???p v??
						c??ch b???n c?? th??? c???p nh???t, qu???n l??, xu???t v?? x??a th??ng tin c???a m??nh.</p>
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
					<h3>Gi???i thi???u</h3>
					<ul class="list-unstyled tweets">
						<li class="d-flex">
							<div class="mr-4">
								<span class="icon icon-twitter"></span>
							</div>
							<div>Ch??ng t??i ph??t tri???n m???t lo???t c??c d???ch v??? gi??p h??ng tri???u
								ng?????i h??ng ng??y kh??m ph?? v?? t????ng t??c v???i th??? gi???i theo nh???ng
								c??ch m???i. C??c d???ch v??? c???a ch??ng t??i g???m c??.</div>
						</li>
						<li class="d-flex">
							<div class="mr-4">
								<span class="icon icon-twitter"></span>
							</div>
							<div>C??c ???ng d???ng, trang web v?? thi???t b??? c???a Google, ch???ng h???n
								nh?? T??m ki???m, YouTube v?? Google Home.</div>
						</li>
						<li class="d-flex">
							<div class="mr-4">
								<span class="icon icon-twitter"></span>
							</div>
							<div>C??c s???n ph???m t??ch h???p v??o c??c ???ng d???ng v?? trang web c???a b??n
								th??? ba, ch???ng h???n nh?? d???ch v??? qu???ng c??o, ph??n t??ch v?? Google
								Maps ???? nh??ng</div>
						</li>
					</ul>
				</div>
				<div class="col-md-3 mb-4 mb-md-0">
					<h3>N???n t???ng kh??c</h3>
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
