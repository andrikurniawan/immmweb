<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeasiswaDonatur */

$this->title = 'Update Beasiswa Donatur: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Beasiswa Donaturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beasiswa-donatur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
