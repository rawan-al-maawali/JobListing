<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Job */

$this->title = 'Filter';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div  class="job-create">

    <h1 style="margin-top:10%; margin-left: 30%;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search', [
        'model' => $model,
    ]) ?>

</div>
