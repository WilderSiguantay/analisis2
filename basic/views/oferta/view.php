<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oferta */

$this->title = $model->idferta;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oferta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idferta' => $model->idferta, 'empresa_idempresa' => $model->empresa_idempresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idferta' => $model->idferta, 'empresa_idempresa' => $model->empresa_idempresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idferta',
            'titulo',
            'descripcion:ntext',
            'puestosVacantes',
            'tiempoContratacion',
            'nivelExperiencia',
            'genero',
            'salarioMInimo',
            'salarioMaximo',
            'escolaridad',
            'empresa_idempresa',
        ],
    ]) ?>

</div>
