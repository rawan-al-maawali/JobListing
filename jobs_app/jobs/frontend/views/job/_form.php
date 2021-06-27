<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="margin:auto; width:40%;" class="job-form">
<?php $items = array("Security", "PHP", "Python"); ?>
  <?php $form = ActiveForm::begin(
  ['id' => 'login-form',
  'options' => [['class' => 'div_center col-md12'],['enctype' => 'multipart/form-data']],
  ]
); ?>

    <?= $form->field($model, 'title_job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_job')->radioList(array('Full time'=>"Full time", 'Part time'=> "Part time")); ?>

    <?= $form->field($model, 'salary_job')->textInput() ?>

    <?= $form->field($model, 'desc_job')->textarea(['rows' => 6]) ?>

  <!--  <?= $form->field($model, 'date_job')->textInput(['placeholder' => "0000-00-00"]) ?> -->

    <?= $form->field($model, 'skills_job')->checkboxList(
	[
		'Prograrmming' => 'Programming',
		'CSS' => 'CSS',
		'JS' => 'JS',
    'Java' => 'Java',
    'DataBase' => 'DataBase'
	],
	['separator' => '<br>']
);
 ?>


    <?= $form->field($model, 'job_picture')->fileInput(['class' => 'formcontrol-file'])->label('Picture') ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
