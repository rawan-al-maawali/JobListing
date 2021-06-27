<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\application */

$this->title = 'Update Application: ' . $model->id_app;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_app, 'url' => ['view', 'id' => $model->id_app]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="font-size: 1em; width: 70%; padding-top: 10%; margin:auto;" class="application-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
