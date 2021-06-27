<?php

namespace app\controllers;
namespace frontend\controllers;

use Yii;
use app\models\application;
use app\models\ApplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ApplicationController implements the CRUD actions for application model.
 */
class ApplicationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all application models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionList($id)
    {
        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('application.job_id ='.$id);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single application model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
      $model = new Application();
      if ($model->load(Yii::$app->request->post())) {


      $image = UploadedFile::getInstance($model, 'photo_app');
      $link = Yii::getAlias('@imageUrl')."/".  $image->getBaseName().".".$image->getExtension();
      $result = $image->saveAs(Yii::getAlias('@imagePath')."/". $image->getBaseName().".".$image->getExtension());
      $model->photo_app = $link;

      $cv = UploadedFile::getInstance($model, 'cv_app');
      $link = Yii::getAlias('@cvUrl')."/".  $cv->getBaseName().".".$cv->getExtension();
      $result = $cv->saveAs(Yii::getAlias('@cvPath')."/". $cv->getBaseName().".".$cv->getExtension());
      $model->cv_app = $link;
      $model->job_id = $id;

      if($result==1 && $model->save())
      {
        return $this->redirect(['view', 'id' => $model->id_app]);
        //echo $model->errors;


      }
      else {
          print_r ($model->errors);
      }

      }
      else {
        return $this->render('create', [
            'model' => $model,
        ]);
      }
    }

    /**
     * Updates an existing application model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_app]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing application model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the application model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return application the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = application::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
