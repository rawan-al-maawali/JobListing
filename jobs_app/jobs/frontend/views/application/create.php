<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\application */

$this->title = 'Create Application';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">

    <h1 style="margin-top:10%; margin-left: 30%;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
