<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\application;

/**
 * ApplicationSearch represents the model behind the search form of `app\models\application`.
 */
class ApplicationSearch extends application
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_app', 'job_id'], 'integer'],
            [['name_app', 'email_app', 'photo_app', 'cv_app'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = application::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_app' => $this->id_app,
            'job_id' => $this->job_id,
        ]);

        $query->andFilterWhere(['like', 'name_app', $this->name_app])
            ->andFilterWhere(['like', 'email_app', $this->email_app])
            ->andFilterWhere(['like', 'photo_app', $this->photo_app])
            ->andFilterWhere(['like', 'cv_app', $this->cv_app]);

        return $dataProvider;
    }
}
