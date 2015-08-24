<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BeasiswaDonatur */

$this->title = 'Create Beasiswa Donatur';
$this->params['breadcrumbs'][] = ['label' => 'Beasiswa Donaturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beasiswa-donatur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
