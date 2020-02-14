<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\Comment;
use app\models\ArticleSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

   

    /**
     * Lists all Article models, ordered by date.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

   


    /**
     * Lists the current users Article models.
     * @return mixed
     */
    public function actionMyarticles()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('myarticlesview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Article models, ordered by views.
     * @return mixed
     */
    public function actionIndexbyviews()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search3(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Article models, ordered by .
     * @return mixed
     */
    public function actionIndexbycomments()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search4(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model, and its comments.
     * @param integer $slug
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug) {

        $model = $this->findModel($slug);


        if (Yii::$app->user->id !==  $model->created_by) {
            $model -> updateCounters(['viewcount'=>1]);            //incrementing counter

        };


        $comment = new Comment();

        if ($comment->load(Yii::$app->request->post()) && $comment->save())  {  //creating new comment
            
            return $this->render('view', [
                'model' => $model,
                'comments' => $comments = Comment::find()->where(['article_id' =>  $id = $model->id])->all(),  //finding the articles own comments
                'comment' => $comment
            ]);
        }
       
        return $this->render('view', [
            'model' => $model,
            'comments' => $comments = Comment::find()->where(['article_id' =>  $id = $model->id])->all(),  //finding the articles own comments
            'comment' => $comment
        ]);
    }



    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect(\Yii::$app->urlManager->createUrl('/article/index'));
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($slug)
    {
        $model = $this->findModel($slug);

        if ($model->created_by !== Yii::$app->user->id){
            throw new ForbiddenHttpException("You do not have permission to edit this article");
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect(\Yii::$app->urlManager->createUrl('/article/index'));
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($slug)
    {
        $model = $this->findModel($slug);
        $comment = Comment::find()->where(['article_id' =>  $id = $model->id])->all();

        if ($model->created_by !== Yii::$app->user->id){
            throw new ForbiddenHttpException("You do not have permission to delete this article");
        }
        foreach ($comment as $com) {
            $com->delete();
        }

        $model->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slug)
    {
        if (($model = Article::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

       /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
}
