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
                'label' => 'Dropdown',
                'items' => [
                    [
                        'label' => 'Quản lí đối tác',
                        'url' => 'doitac'
                    ],

                    [
                        'label' => 'Quản lí khách hàng',
                        'url' => 'khachhang'
                    ],

                    [
                        'label' => 'Quản lí Hợp Đồng',
                        'url' => 'hopdong'
                    ],

                    [
                        'label' => 'Quản lí Đơn đặt hàng',
                        'url' => 'dondathang'
                    ],

                    [
                        'label' => 'Quản lí cua hang',
                        'url' => 'cuahang'
                    ],

                    [
                        'label' => 'Quản lí tài xế ',
                        'url' => 'taixe'
                    ]
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

	<footer>
		<!-- place footer here -->
		<section class="container-fluid p-4 section-bg  mt-5 ">
			<div class="row justify-content-around align-content-around">
				<div class="col-3">
					<a class="btn text-light ">Tích điểm tặng quà VIP</a> <a
						class="btn text-light ">Lịch sữ nhận quà</a> <a
						class="btn text-light ">Tìm hiểu về mua trả góp</a> <a
						class="btn text-light ">Chính xác bảo hành</a>
				</div>
				<div class="col-3">
					<a class="btn text-light ">Tích điểm tặng quà VIP</a> <a
						class="btn text-light  ">Lịch sữ nhận quà</a> <a
						class="btn text-light ">Tìm hiểu về mua trả góp</a> <a
						class="btn text-light ">Chính xác bảo hành</a>
				</div>
				<div class="col-3">
					<a class="btn text-light ">Tích điểm tặng quà VIP</a> <a
						class="btn text-light ">Lịch sữ nhận quà</a> <a
						class="btn text-light ">Tìm hiểu về mua trả góp</a> <a
						class="btn text-light ">Chính xác bảo hành</a>
				</div>


			</div>

		</section>


	</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
