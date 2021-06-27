<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="font-size: 1em; width: 65%; padding-top: 7%; margin:auto; text-align: center;" class="job-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Job', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $keys = $dataProvider->getKeys(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_job',
            'title_job',
            'type_job',
            'salary_job',
            'desc_job:ntext',
            //'date_job',
            //'skills_job:ntext',
          /*  [
              'attribute'=>'job_picture',
              'label'=>'Image',
              'format'=>'html',
              'value' => function ($index) {
                  return Html::img( $index->job_picture,
                  ['width' => '60px']);
                },
              ],*/

              ['class' => 'yii\grid\ActionColumn',
              'template' => '{view} {update} {delete} {myButton}',  // the default buttons + your custom button
              'buttons' => [
                  'myButton' => function ($model, $index) use ($keys, $dataProvider) {     // render your custom button
                    //  return $model->status === 'editable' ? Html::a('Update', $url) : '';
                    $models = $dataProvider->models;
                    //$job = $models[$index-1];

                    return Html::a("<span class='glyphicon glyphicon-user'></span>", ['application/list', 'id'=>$index->id_job]);
                  }
              ]
            ],
        ],
    ]); ?>


</div>
