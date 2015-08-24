<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="col-md-2">
    <?php echo \yii\helpers\Html::a('<i class="glyphicon glyphicon-arrow-left"></i>', Yii::$app->request->referrer,['class'=>'btn btn-default',['span'=>'glyphicon glyphicon-arrow-left']]); ?>
</div>

<div class="col-md-8">
    <p>
        <h2><?php echo $forum->nama;?><?= Html::a('<i class="glyphicon glyphicon-plus"></i> Buat Post Baru', ['create'], ['class' => 'btn btn-success pull-right']) ?></h2>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="media">
        <?php foreach ($posting as $posting):?>
            <div class="col-md-12">
        <div class="media-left media-top">
            <a href="#">
                <?php foreach ($fotoPost as $fotoOrang): ?>
                    <img class="media-object" src="<?php echo $fotoOrang->foto;?>" alt="tes" width="64px" height="64px">
                <?php endforeach; ?>
            </a>
        </div>
        <div class="media-body">
            <div>
            <a href="<?php echo Url::to(['view','id'=>$posting->id]);?>">
                <h4 class="media-heading"><?php echo $posting->judul;?>
                    <?= Html::a('Lihat', Url::to(['view','id'=>$posting->id]), ['class' => 'btn btn-primary pull-right','height'=>'10px']) ?>
                </h4>
            </a>
            </div>
                <p>Posted by <?php echo $posting->nama;?> - <?php echo Yii::$app->formatter->asDatetime($posting->waktu);?></p></br>
        </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="col-md-2"></div>
