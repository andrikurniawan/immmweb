<?php

namespace frontend\controllers;

use frontend\models\Comment;
use frontend\models\CommentSearch;
use frontend\models\Forum;
use Yii;
use frontend\models\Post;
use frontend\models\PostSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\User;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {

        $kategory_forum = Yii::$app->session['forum_id'];
        $posting = Post::find()->where(['kategory_forum'=>$kategory_forum])->all();
        $forum = Forum::find()->where(['id'=>$kategory_forum])->one();
        $nama = "";
        foreach($posting as $postings){
            $nama = $postings->nama;
        }
        $usr = new \common\models\User();
        $fotoPost = $usr->find()->where(['nama'=>$nama])->all();

        return $this->render('index', [
            'posting' => $posting,
            'forum' => $forum,
            'fotoPost' => $fotoPost,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->session['post_id'] = $id;
        $querykomen = Comment::find()->where(['post_id'=>$id]);
        $hitungkomen = clone $querykomen;
        $page = new Pagination(['totalCount'=>$hitungkomen->count()]);
        $komen = $querykomen->offset($page->offset)
            ->limit($page->limit)
            ->all();

        $namaKomen = "";
        foreach($komen as $komens){
        $namaKomen = $komens->nama;
        }

        $nama = $this->findModel($id)->nama;
        $usr = new \common\models\User();
        $fotoPost = $usr->find()->where(['nama'=>$nama])->all();
        $fotoKomen = $usr->find()->where(['nama'=>$namaKomen])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'komen' => $komen,
            'fotoPost' => $fotoPost,
            'fotoKomen' => $fotoKomen,
            'page' => $page,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if (isset($_POST['Post'])) {
            $model->attributes = $_POST['Post'];
            $model->setAttribute('id', $model->id);
            $model->setAttribute('nama', Yii::$app->user->identity->nama);
            $model->setAttribute('kategory_forum', Yii::$app->session['forum_id']);
            $model->setAttribute('judul', $model->judul);
            $model->setAttribute('isi_post', $model->isi_post);
            if ($model->save()){
                Yii::$app->getSession()->setFlash('success', 'Posting Anda telah ditambahkan');
                $this->redirect(['index']);
            }
        }else {
                return $this->render('create', [
                    'model' => $model,
                ]);
        }

    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
