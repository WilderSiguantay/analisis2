<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Postulantes */

$this->title = $model->idPostulantes;
$this->params['breadcrumbs'][] = ['label' => 'Postulantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postulantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPostulantes' => $model->idPostulantes, 'detalleOferta_idDetalleOferta' => $model->detalleOferta_idDetalleOferta, 'candidato_idcandidato' => $model->candidato_idcandidato], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPostulantes' => $model->idPostulantes, 'detalleOferta_idDetalleOferta' => $model->detalleOferta_idDetalleOferta, 'candidato_idcandidato' => $model->candidato_idcandidato], [
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
            'idPostulantes',
            'detalleOferta_idDetalleOferta',
            'candidato_idcandidato',
        ],
    ]) ?>

</div>
