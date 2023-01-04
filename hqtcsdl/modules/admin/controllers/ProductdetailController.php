<?php

namespace app\modules\admin\controllers;

use app\models\Productdetail;
use app\models\ProductdetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductdetailController implements the CRUD actions for Productdetail model.
 */
class ProductdetailController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Productdetail models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductdetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productdetail model.
     * @param int $ID_D_PROC Id D Proc
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID_D_PROC)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID_D_PROC),
        ]);
    }

    /**
     * Creates a new Productdetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Productdetail();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID_D_PROC' => $model->ID_D_PROC]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Productdetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID_D_PROC Id D Proc
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID_D_PROC)
    {
        $model = $this->findModel($ID_D_PROC);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID_D_PROC' => $model->ID_D_PROC]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Productdetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID_D_PROC Id D Proc
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID_D_PROC)
    {
        $this->findModel($ID_D_PROC)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Productdetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID_D_PROC Id D Proc
     * @return Productdetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID_D_PROC)
    {
        if (($model = Productdetail::findOne(['ID_D_PROC' => $ID_D_PROC])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
