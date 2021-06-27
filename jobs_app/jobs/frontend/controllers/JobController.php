<?php

namespace app\controllers;
namespace frontend\controllers;

use Yii;
use app\models\Job;
use app\models\JobSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends Controller
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
     * Lists all Job models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionList()
    {
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Job model.
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
     * Creates a new Job model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Job();
        $model->date_job = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post())) {


        $image = UploadedFile::getInstance($model, 'job_picture');
        $link = Yii::getAlias('@imageUrl')."/".  $image->getBaseName().".".$image->getExtension();
        $result = $image->saveAs(Yii::getAlias('@imagePath')."/". $image->getBaseName().".".$image->getExtension());
        $model->job_picture = $link;
        $data = "";
        for($i=0; $i<sizeof($model->skills_job); $i++)
        {
          $data .= $model->skills_job[$i].",";
        }
        $model->skills_job = $data;


        if($result==1 && $model->save())
        {
          return $this->redirect(['view', 'id' => $model->id_job]);
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
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_job]);
            
        }


        $data = "";
        for($i=0; $i<sizeof($model->skills_job); $i++)
        {
          $data .= $model->skills_job[$i].",";
        }
        $model->skills_job = $data;

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Job model.
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
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
