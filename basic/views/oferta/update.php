<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oferta */

$this->title = 'Update Oferta: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idferta, 'url' => ['view', 'idferta' => $model->idferta, 'empresa_idempresa' => $model->empresa_idempresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oferta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
