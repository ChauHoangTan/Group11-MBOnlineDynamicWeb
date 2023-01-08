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
                'label' => 'Pricing',
                'url' => [
                    '/site/about'
                ]
            ],
            [
                'label' => 'Contact',
                'url' => [
                    '/site/contact'
                ]
            ],
            [
                'label' => '<i class="fa-solid fa-cart-shopping"></i>',
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
		<div class="container-fluid  w-100">
        <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	</main>

	<footer class="footer-32892 pb-0">
	
			<div class="container">
				<div class="row">
					<div class="col-md  mb-4 mb-md-0">
						<h3>About Us</h3>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur
							adipisicing elit. Laboriosam itaque unde facere repellendus, odio
							et iste voluptatum aspernatur ratione mollitia tempora eligendi
							maxime est, blanditiis accusamus. Incidunt, aut, quis!</p>
						<ul class="list-unstyled quick-info mb-4">
							<li><a href="#" class="d-flex align-items-center"> <i
									class="fa-solid fa-phone mx-3"></i> 1 291 3912 329
							</a></li>
							<li><a href="#" class="d-flex align-items-center"> <i class="fa-solid fa-envelope  mx-3"></i> fit.hcmus@gmail.com</a></li>
						</ul>

					</div>
					<div class="col-md mb-4 mb-md-0">
						<h3>Latest Tweet</h3>
						<ul class="list-unstyled tweets">
							<li class="d-flex">
								<div class="mr-4">
									<span class="icon icon-twitter"></span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									Facere unde omnis veniam porro excepturi.</div>
							</li>
							<li class="d-flex">
								<div class="mr-4">
									<span class="icon icon-twitter"></span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									Facere unde omnis veniam porro excepturi.</div>
							</li>
							<li class="d-flex">
								<div class="mr-4">
									<span class="icon icon-twitter"></span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									Facere unde omnis veniam porro excepturi.</div>
							</li>
						</ul>
					</div>
					<div class="col-md-3 mb-4 mb-md-0">
						<h3>Instagram</h3>
						<div class="row gallery">
							<div class="col-6 h1  ">
								<a href="#"><i class="btn-me fa-brands fa-google"></i></a> <a
									href="#"><i class=" btn-me fa-brands fa-google-play"></i></a>
							</div>
							<div class="col-6 h1 ">
								<a href="#"><i class="btn-me fa-brands fa-facebook"></i></a> <i
									class=" btn-me fa-brands fa-instagram"></i></a>
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
