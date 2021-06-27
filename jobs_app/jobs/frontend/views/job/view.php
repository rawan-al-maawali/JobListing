<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
if (!Yii::$app->user->isGuest) {


  /* @var $this yii\web\View */
  /* @var $model app\models\Job */

  $this->title = $model->title_job;
  $this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
  \yii\web\YiiAsset::register($this);
  ?>
  <div style="font-size: 1.5em; width: 50%; padding-top: 10%; margin:auto; text-align: center;" class="job-view">

      <h1><?= Html::encode($this->title) ?></h1>

      <p>
          <?= Html::a('Update', ['update', 'id' => $model->id_job], ['class' => 'btn btn-primary']) ?>
          <?= Html::a('Delete', ['delete', 'id' => $model->id_job], [
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
              'id_job',
              'title_job',
              'type_job',
              'salary_job',
              'desc_job:ntext',
              'date_job',
              'skills_job:ntext',
              'job_picture',
          ],
      ]) ?>
  <?php  }



  else {


  /* @var $this yii\web\View */
  /* @var $model app\models\Job */

  $this->title = $model->title_job;
  $this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
  \yii\web\YiiAsset::register($this);
  ?>
  <div style="font-size: 1.5em; width: 50%; padding-top: 10%; margin:auto; text-align: center;" class="job-view">

      <h1><?= Html::encode($this->title) ?></h1>


      <?= DetailView::widget([
          'model' => $model,
          'attributes' => [
              'id_job',
              'title_job',
              'type_job',
              'salary_job',
              'desc_job:ntext',
              'date_job',
              'skills_job:ntext',
              'job_picture',
          ],
      ]) ?>
  <?= Html::a('Apply', ['application/create', 'id' => $model->id_job], ['class' => 'btn btn-primary'])  ?>
  </div>
<?php } ?>
