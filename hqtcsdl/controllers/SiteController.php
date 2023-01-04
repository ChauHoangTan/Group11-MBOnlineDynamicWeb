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
        $amount = 8;
        
        $noibat = Product::ProductNoiBat($amount);
       
        return $this->render('index', [
            'products' => $noibat,
        
        ]);
    }

    public function actionProductdetail($id){
        $productDetail=Productdetail::findOne($id);
        return $this->render('productdetail', [
            'productdetails'=> $productDetail
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
    }

    public function actionCart()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->close();
        if (isset($session['cart'])) {
            $cart = $session['cart'];
            $products = MonAn::find()->all();
            $response = array();
            foreach ($cart as $key=>$value) {
                foreach ($products as $product) {
                    if ($key ==$product["ID_MON_AN"]) {
                        $productinfo = [
                            "id" => $product["ID_MON_AN"],
                            "name" => $product["TENMON"],
                            "price" => $product["GIA"],
                            "image" => '',
                            "configuration" => '',
                            "amount" => $value,
                        ];
                        array_push($response,$productinfo );
                    }
                   
                }
            }
                return $this->render('cart', [
                    'products' =>$response,
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
     */public function actionUpdateProductOnCart($id, $val)
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
         return $this->redirect(['site/cart']);
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