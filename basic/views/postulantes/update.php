<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Postulantes */

$this->title = 'Update Postulantes: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Postulantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPostulantes, 'url' => ['view', 'idPostulantes' => $model->idPostulantes, 'detalleOferta_idDetalleOferta' => $model->detalleOferta_idDetalleOferta, 'candidato_idcandidato' => $model->candidato_idcandidato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="postulantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
