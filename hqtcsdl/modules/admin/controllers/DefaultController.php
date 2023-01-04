<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = "main2";
    /**
     * Renders the index view for the module
     *
     * @return string
     */
   
    public function actionIndex()
    {
        return $this->render('index');
    }
}
