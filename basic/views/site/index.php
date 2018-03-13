<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ofertas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oferta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idferta',
            'titulo',
            'descripcion:ntext',
            'puestosVacantes',
            //'salario',
            //'nivelExperiencia',
            //'genero',
           // 'Empresa',
            
            //'escolaridad',
            //'empresa_idempresa',

            
        ],
    ]); ?>
</div>

