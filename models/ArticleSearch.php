<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;
use Yii;

/**
 * ArticleSearch represents the model behind the search form of `app\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['title', 'slug', 'body'], 'safe'],
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
        $query = Article::find()->where(['public' => 1])->orderBy('created_at DESC');

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



        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     * Search own articles
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search2($params)
    {
        $query =  Article::find()->where(['created_by' => Yii::$app->user->identity->id])->orderBy('created_at DESC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails

            return $dataProvider;
        }

       return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     * Search articles, ordered by views.
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search3($params)
    {
        $query =  Article::find()->where(['public' => 1])->orderBy('viewcount DESC');;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails

            return $dataProvider;
        }

    

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     * Search articles, ordered by comments.
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search4($params)
    {
        $query =  Article::find()->where(['public' => 1])->orderBy('comments DESC');;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails

            return $dataProvider;
        }

        return $dataProvider;
    }

   
}
