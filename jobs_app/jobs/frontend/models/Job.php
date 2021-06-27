<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id_job
 * @property string $title_job
 * @property string $type_job
 * @property float $salary_job
 * @property string $desc_job
 * @property string $date_job
 * @property string $skills_job
 * @property string $job_picture
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_job', 'type_job', 'salary_job', 'desc_job', 'skills_job', 'job_picture'], 'required'],
            [['salary_job'], 'number', 'min' =>1,  'tooSmall' => '{attribute} salary must be greater than zero'],
            [['desc_job', 'skills_job'], 'string'],
            [['date_job'], 'safe'],
            [['title_job', 'type_job', 'job_picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_job' => 'Id Job',
            'title_job' => 'Title',
            'type_job' => 'Job Type',
            'salary_job' => 'Salary',
            'desc_job' => 'Description',
            'date_job' => 'Date',
            'skills_job' => 'Skills',
            'job_picture' => 'Picture',
        ];
    }
}
