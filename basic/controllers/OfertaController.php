<?php

namespace app\controllers;

use Yii;
use app\models\Oferta;
use app\models\OfertaSearch;

use app\models\Empresa;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OfertaController implements the CRUD actions for Oferta model.
 */
class OfertaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Oferta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OfertaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
    }

    /**
     * Displays a single Oferta model.
     * @param integer $idferta
     * @param integer $empresa_idempresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idferta, $empresa_idempresa)
    {
        return $this->render('view', [
            'model' => $this->findModel($idferta, $empresa_idempresa),
        ]);
    }

    /**
     * Creates a new Oferta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Oferta();
  

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idferta' => $model->idferta, 'empresa_idempresa' => $model->empresa_idempresa]);
        }

        return $this->render('create', [
            'model' => $model, 
        ]);
    }

    /**
     * Updates an existing Oferta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idferta
     * @param integer $empresa_idempresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idferta, $empresa_idempresa)
    {
        $model = $this->findModel($idferta, $empresa_idempresa);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idferta' => $model->idferta, 'empresa_idempresa' => $model->empresa_idempresa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Oferta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idferta
     * @param integer $empresa_idempresa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idferta, $empresa_idempresa)
    {
        $this->findModel($idferta, $empresa_idempresa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Oferta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idferta
     * @param integer $empresa_idempresa
     * @return Oferta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idferta, $empresa_idempresa)
    {
        if (($model = Oferta::findOne(['idferta' => $idferta, 'empresa_idempresa' => $empresa_idempresa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
