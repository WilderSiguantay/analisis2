<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Postulantes */

$this->title = 'Create Postulantes';
$this->params['breadcrumbs'][] = ['label' => 'Postulantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postulantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
