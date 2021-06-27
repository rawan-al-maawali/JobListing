<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id_app
 * @property string $name_app
 * @property string $email_app
 * @property string $photo_app
 * @property string $cv_app
 * @property int $job_id
 *
 * @property Job $job
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_app', 'email_app', 'photo_app', 'cv_app'], 'required'],
            [['job_id'], 'integer'],
            [['name_app', 'email_app', 'photo_app', 'cv_app'], 'string', 'max' => 255],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'id_job']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_app' => 'Id',
            'name_app' => 'Name',
            'email_app' => 'Email',
            'photo_app' => 'Photo',
            'cv_app' => 'CV',
            'job_id' => 'Job ID',
        ];
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['id_job' => 'job_id']);
    }
}
