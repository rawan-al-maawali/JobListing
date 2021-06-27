<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = 'Update Job: ' . $model->id_job;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_job, 'url' => ['view', 'id' => $model->id_job]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="font-size: 1em; width: 70%; padding-top: 10%; margin: auto;" class="job-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
