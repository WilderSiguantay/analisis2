<?php

use yii\helpers\Html;
use app\models\Empresa;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Oferta */

$this->title = 'Crear Oferta';
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model1 =Empresa::find()->all();
$listData=ArrayHelper::map($model1,'idempresa','nombre');


?>
<div class="oferta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= 
    	

    $this->render('_form', [
        'model' => $model, 'listData' => $listData,
    ]) ?>

</div>
