<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\application */
/* @var $form yii\widgets\ActiveForm */

?>

<div style="margin:auto; width:40%;" class="application-form">

    <?php $form = ActiveForm::begin([
      'id' => "job_id"
    ]); ?>

    <?= $form->field($model, 'name_app')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_app')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_app')->fileInput(['class' => 'formcontrol-file'])->label('Photo') ?>

    <?= $form->field($model, 'cv_app')->fileInput(['class' => 'formcontrol-file'])->label('CV') ?>



    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
