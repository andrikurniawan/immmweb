<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ForumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forum';
?>
<div class="forum-index">

    <h1 style="text-align: center;">Forum</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3">
            <?php foreach ($umum as $umum):?>
                <a href="<?php echo Url::to(['view','id'=>$umum->id]);?>" class="thumbnail">
                    <img src="<?php echo Yii::$app->request->baseUrl.'/'.$umum->logo;?>" WIDTH="128px" height="128px" alt="<?php echo $umum->nama?>">

                </a>
            <?php endforeach; ?>
        </div>

        <?php foreach ($fakultas as $fakultas):?>
        <div class="col-md-2 col-sm-3 col-xs-3">
                <a href="<?php echo Url::to(['view','id'=>$fakultas->id]);?>" class="thumbnail">
                    <img src="<?php echo Yii::$app->request->baseUrl.'/'.$fakultas->logo;?>" WIDTH="128px" height="128px" alt="<?php echo $fakultas->nama?>">

                </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
