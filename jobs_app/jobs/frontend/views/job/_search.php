<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="font-size: 2em; width: 50%; padding: 10px; margin:auto; text-align: center;" class="job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['list'],
        'method' => 'get',
    ]); ?>
<?php
/*
    <?=// $form->field($model, 'id_job') ?>

    <?=// $form->field($model, 'title_job') ?> */ ?>

    <?php
echo $form->field($model, 'type_job')->dropDownList(
            ['Full time' => 'Full time', 'Part time' => 'Part time']
    ); ?>

  <?php /*  <?= //$form->field($model, 'salary_job') ?>

    <?= //$form->field($model, 'desc_job') ?>

    <?php // echo $form->field($model, 'date_job') ?>

    <?php // echo $form->field($model, 'skills_job') ?>

    <?php // echo $form->field($model, 'job_picture')  */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
