<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */

$this->title = "IMMM: ".$model->judul;

?>
<div class="post-view">

    <div class="col-md-2">
        <?php echo \yii\helpers\Html::a('<i class="glyphicon glyphicon-arrow-left"></i>', Yii::$app->request->referrer,['class'=>'btn btn-default',['span'=>'glyphicon glyphicon-arrow-left']]); ?>
    </div>
    <div class="col-md-8">
        <div class="media">
            <div class="media-left media-top">
                <a href="#">
                    <?php foreach ($fotoPost as $fotoOrang): ?>
                    <img class="media-object" src="<?php echo $fotoOrang->foto;?>" alt="tes" width="64px" height="64px">
                    <?php endforeach; ?>
                </a>
            </div>
            <div class="media-body">
                <h3 class="media-heading"><?php echo $model->judul;?>
                    <p class="pull-right">
                    <?= Html::a('Reply', ['/comment/create'], ['class' => 'btn btn-primary',]) ?>
                    <?php if($model->nama == Yii::$app->user->identity->nama ){
                        echo Html::a('Edit', Url::to(['update','id'=>$model->id]),['class'=>'btn btn-primary']);
                        echo " ";
                        echo Html::a('Delete', Url::to(['delete','id'=>$model->id]),['class'=>'btn btn-danger','data-method'=>'post']);
                    } ?>
                    </p>
                </h3>
                <p><?php echo $model->nama. " - ". Yii::$app->formatter->asDatetime($model->waktu);?></p>
                <p><?php echo $model->isi_post;?></p>

                <div class="media">
                <?php foreach ($komen as $comment): ?>
                    <div class="col-md-12">
                    <div class="media-left media-top">
                        <a href="#">
                            <?php foreach ($fotoKomen as $fotoOrangKomen): ?>
                            <img class="media-object" src="<?php echo $fotoOrangKomen->foto;?>" alt="tes" width="56px" height="56px">
                            <?php endforeach; ?>
                        </a>
                    </div>
                    <div class="media-body">
                    <h5><?php echo $comment->nama. " - ". Yii::$app->formatter->asDatetime($comment->waktu);?>
                        <p class="pull-right">
                            <?php if($comment->nama == Yii::$app->user->identity->nama ){
                                echo Html::a('Edit', Url::to(['/comment/update','id'=>$comment->id]));
                                echo " | ";
                                echo Html::a('Delete', Url::to(['/comment/delete','id'=>$comment->id]),['style'=>'color:red;','data-method'=>'post']);
                            } ?> </p>
                    </h5>
                        <p><?php echo $comment->isi;?></p><p></p>
                    </div>
                    </div>
                <?php endforeach; ?>
                    <?php echo \yii\widgets\LinkPager::widget(['pagination'=>$page]); ?>
            </div>
        </div>
    </div>
        </div>
    <div class="col-md-2"></div>

</div>
