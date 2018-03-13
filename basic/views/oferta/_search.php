<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OfertaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oferta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idferta') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'puestosVacantes') ?>

    <?= $form->field($model, 'tiempoContratacion') ?>

    <?php // echo $form->field($model, 'nivelExperiencia') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'salarioMInimo') ?>

    <?php // echo $form->field($model, 'salarioMaximo') ?>

    <?php // echo $form->field($model, 'escolaridad') ?>

    <?php // echo $form->field($model, 'empresa_idempresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
