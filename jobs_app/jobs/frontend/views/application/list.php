<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $products = $dataProvider->getModels(); ?>
<div style="font-size: 1em; width: 70%; padding-top: 10%; margin:auto; text-align: center;" class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_app',
            'name_app',
            'email_app:email',
            [
              'attribute'=>'photo_app',
              'label'=>'Image',
              'format'=>'html',
              'value' => function ($index) {
                  return Html::img( $index->photo_app,
                  ['width' => '60px']);
                },
              ],
            'cv_app',
            //'job_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
