<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\application */

$this->title = $model->id_app;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div style="font-size: 1em; width: 50%; padding-top: 10%; margin:auto; text-align: center;" class="application-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_app], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_app], [
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
            'id_app',
            'name_app',
            'email_app:email',
            'photo_app',
            'cv_app',
            'job_id',
        ],
    ]) ?>

</div>
