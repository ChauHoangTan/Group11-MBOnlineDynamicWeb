<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Newuser;
use app\models\Product;
use app\models\Productdetail;
use app\models\Img;

class SiteController extends Controller
{

    /**
     *
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => [
                        'post'
                    ]
                ]
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /*
         * $users=\app\models\User::find()->all();
         *
         * foreach ($users as $user){
         * $user->password=Yii::$app->security->generatePasswordHash($user->password);
         * $user->authkey= Yii::$app->security->generateRandomString();
         * $user->update();
         * }
         */
        $amount = 4;

        return $this->render('index', [

            'amount' => 4,
            'type' => ''
        ]);
    }

    public function actionDefaulamountshow()
    {
        Yii::$app->session['amount'] = 4;
    }

    public function actionContent()
    {
        $amount = 4;
        $type = 'SORT_DESC';
        if (isset($_POST["type"])) {
            $type = $_POST["type"];
        }
        if (isset(Yii::$app->session['amount'])) {
            Yii::$app->session['amount'] += 4;
            $amount = Yii::$app->session['amount'];
        } else {
            Yii::$app->session['amount'] = 4;
        }
        $check = ($amount < count(Product::find()->all())) ? 1 : 0;
        $noibat = Product::ProductNoiBat($amount, $type);
        return $this->renderAjax('content', [
            'url' => Yii::$app->homeUrl,
            'products' => $noibat,
            'check' => $check
        ]);
    }

    public function actionProductdetail($id)
    {
        $product = Product::findOne($id);
        $productDetail = Productdetail::getProductDetail($id);
        $imgProduct = Img::find()->where('ID_PROC=' . $id)->all();
        $type = 'SORT_DESC';
        $noibat = Product::ProductNoiBat(4, $type);
        $products = $this->renderAjax('content2', [
            'url' => Yii::$app->homeUrl,
            'products' => $noibat,
            'check' => 1
        ]);
        return $this->render('productdetail', [
            'productdetails' => $productDetail,
            'product' => $product,
            'img' => $imgProduct,
            'listproduct' => $products
        ]);
    }

    public function actionAddProductToCart($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = array();
        // chưa có giỏ hàng
        if (! isset($session['cart'])) {
            $cart[$id] = 1;
            $session['cart'] = $cart;
        } // đã có giỏ hàng
        else {
            $cart = $session['cart'];
            $check = false;
            foreach ($cart as $key => $value) {
                // sản phẩm đã được thêm vào trước đó
                if ($key == $id) {
                    $cart[$id] += 1;
                    $check = true;
                    break;
                }
            }
            // sản phẩm xuất hiện lần đầu tiên
            if (! $check) {
                $cart[$id] = 1;
            }
            $session['cart'] = $cart;
        }
        echo count($cart);
    }

    public function actionCart()
    {
        $session = Yii::$app->session;
        if (isset($session['cart'])) {
            $cart = $session['cart'];
            $products = Product::find()->all();
            $response = array();
            foreach ($cart as $key => $value) {
                foreach ($products as $product) {
                    if ($key == $product["ID_PROC"]) {
                        $productinfo = [
                            "id" => $product["ID_PROC"],
                            "name" => $product["NAME_PROC"],
                            "price" => $product["PRICE"],
                            "image" => $product["img"],
                            "configuration" => '',
                            "amount" => $value
                        ];
                        array_push($response, $productinfo);
                    }
                }
            }
            return $this->render('cart', [
                'products' => $response,
                'session' => $session['cart']
            ]);
        }

        return $this->render('cart', [
            'products' => "",
            'session' => ""
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionUpdateProductOnCart($id, $val)
    {
        $session = Yii::$app->session;
        $session->open();
        if (isset($session['cart'])) {
            $cart = $session['cart'];
            foreach ($cart as $key => $value) {
                // sản phẩm đã được thêm vào trước đó
                if ($key == $id) {
                    $cart[$id] += $val;
                }
            }
            $session['cart'] = $cart;
            // kiểm tra có sản phẩm nào bằng 0 thì xóa khỏi giỏ hàng
            foreach ($cart as $key => $value) {
                if ($value == 0) {
                    unset($cart[$key]);
                    $this->redirect([
                        'cart'
                    ]);
                }
            }
            $session['cart'] = $cart;
        }
    }

    public function actionOrderProduct($name, $email, $address)
    {
        $session = Yii::$app->session;
        if (isset($session['cart'])) {
            $cart = $session['cart'];
            $products = Product::find()->all();
            $response = array();
            foreach ($cart as $key => $value) {
                foreach ($products as $product) {
                    if ($key == $product["ID_PROC"]) {
                        $productinfo = [
                            "id" => $product["ID_PROC"],
                            "name" => $product["NAME_PROC"],
                            "price" => $product["PRICE"],
                            "image" => $product["img"],
                            "configuration" => '',
                            "amount" => $value
                        ];
                        array_push($response, $productinfo);
                    }
                }
            }
            $str = $this->renderAjax('mail', [
                'products' => $response,
                'session' => $session['cart']
            ]);
        } else {

            $str = $this->renderAjax('mail', [
                'products' => "",
                'session' => ""
            ]);
        }
        Yii::$app->mailer->compose()
            ->setFrom('quyennhuthanh@gmail.com')
            ->setTo($email)
            ->setSubject('XÁC NHẬN ĐƠN HÀNG')
            ->setHtmlBody($str)
            ->send();
        $this->redirect('index');
        echo $str;
    }

    public function actionLogin()
    {
        if (! Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
