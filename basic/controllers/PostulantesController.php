<?php

namespace app\controllers;

use Yii;
use app\models\Postulantes;
use app\models\PostulantesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostulantesController implements the CRUD actions for Postulantes model.
 */
class PostulantesController extends Controller
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
     * Lists all Postulantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostulantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Postulantes model.
     * @param integer $idPostulantes
     * @param string $detalleOferta_idDetalleOferta
     * @param integer $candidato_idcandidato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPostulantes, $detalleOferta_idDetalleOferta, $candidato_idcandidato)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPostulantes, $detalleOferta_idDetalleOferta, $candidato_idcandidato),
        ]);
    }

    /**
     * Creates a new Postulantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Postulantes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPostulantes' => $model->idPostulantes, 'detalleOferta_idDetalleOferta' => $model->detalleOferta_idDetalleOferta, 'candidato_idcandidato' => $model->candidato_idcandidato]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Postulantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idPostulantes
     * @param string $detalleOferta_idDetalleOferta
     * @param integer $candidato_idcandidato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPostulantes, $detalleOferta_idDetalleOferta, $candidato_idcandidato)
    {
        $model = $this->findModel($idPostulantes, $detalleOferta_idDetalleOferta, $candidato_idcandidato);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPostulantes' => $model->idPostulantes, 'detalleOferta_idDetalleOferta' => $model->detalleOferta_idDetalleOferta, 'candidato_idcandidato' => $model->candidato_idcandidato]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Postulantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idPostulantes
     * @param string $detalleOferta_idDetalleOferta
     * @param integer $candidato_idcandidato
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPostulantes, $detalleOferta_idDetalleOferta, $candidato_idcandidato)
    {
        $this->findModel($idPostulantes, $detalleOferta_idDetalleOferta, $candidato_idcandidato)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Postulantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idPostulantes
     * @param string $detalleOferta_idDetalleOferta
     * @param integer $candidato_idcandidato
     * @return Postulantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPostulantes, $detalleOferta_idDetalleOferta, $candidato_idcandidato)
    {
        if (($model = Postulantes::findOne(['idPostulantes' => $idPostulantes, 'detalleOferta_idDetalleOferta' => $detalleOferta_idDetalleOferta, 'candidato_idcandidato' => $candidato_idcandidato])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionRegister()
 {
  //Creamos la instancia con el model de validación
  $model = new FormRegister;
   
  //Mostrará un mensaje en la vista cuando el usuario se haya registrado
  $msg = null;
   
  //Validación mediante ajax
  if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
   
  //Validación cuando el formulario es enviado vía post
  //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
  //También previene por si el usuario tiene desactivado javascript y la
  //validación mediante ajax no puede ser llevada a cabo
  if ($model->load(Yii::$app->request->post()))
  {
   if($model->validate())
   {
    //Preparamos la consulta para guardar el usuario
    $table = new Users;
    $table->username = $model->username;
    $table->email = $model->email;
    //Encriptamos el password
    $table->password = crypt($model->password, Yii::$app->params["salt"]);
    //Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
    //clave será utilizada para activar el usuario
    $table->authKey = $this->randKey("abcdef0123456789", 200);
    //Creamos un token de acceso único para el usuario
    $table->accessToken = $this->randKey("abcdef0123456789", 200);
     
    //Si el registro es guardado correctamente
    if ($table->insert())
    {
     //Nueva consulta para obtener el id del usuario
     //Para confirmar al usuario se requiere su id y su authKey
     $user = $table->find()->where(["email" => $model->email])->one();
     $id = urlencode($user->id);
     $authKey = urlencode($user->authKey);
      
     $subject = "Confirmar registro";
     $body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
     $body .= "<a href='http://yii.local/index.php?r=site/confirm&id=".$id."&authKey=".$authKey."'>Confirmar</a>";
      
     //Enviamos el correo
     Yii::$app->mailer->compose()
     ->setTo($user->email)
     ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
     ->setSubject($subject)
     ->setHtmlBody($body)
     ->send();
     
     $model->username = null;
     $model->email = null;
     $model->password = null;
     $model->password_repeat = null;
     
     $msg = "Enhorabuena, ahora sólo falta que confirmes tu registro en tu cuenta de correo";
    }
    else
    {
     $msg = "Ha ocurrido un error al llevar a cabo tu registro";
    }
     
   }
   else
   {
    $model->getErrors();
   }
  }
  return $this->render("register", ["model" => $model, "msg" => $msg]);
 }
}
