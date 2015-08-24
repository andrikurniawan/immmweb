<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'nama') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'tanggal_lahir')->widget(\yii\jui\DatePicker::classname(),
                    ['language' => 'id', 'dateFormat' => 'dd/MM/yyyy',
                    'options' => ['class' => 'form-control']
                ]) ?>

                <?= $form->field($model, 'fakultas')->dropDownList([
                    'FK'=>'FK',
                    'FKG'=>'FKG',
                    'FKM' => 'FKM',
                    'Farmasi' => 'Farmasi',
                    'FIK' => 'FIK',
                    'Fasilkom' => 'Fasilkom',
                    'FT' => 'FT',
                    'FMIPA' => 'FMIPA',
                    'FH' => 'FH',
                    'FISIP' => 'FISIP',
                    'FIA' => 'FIA',
                    'FIB' => 'FIB',
                    'FEB' => 'FIB',
                    'FPsiko' => 'FPsiko',
                    'Vokasi' => 'Vokasi',])?>

                <?= $form->field($model, 'jurusan') ?>

                <?= $form->field($model, 'angkatan')->dropDownList([
                    '2006' => '2006',
                    '2007' => '2007',
                    '2008' => '2008',
                    '2009' => '2009',
                    '2010' => '2010',
                    '2011' => '2011',
                    '2012' => '2012',
                    '2013' => '2013',
                    '2014' => '2014',
                    '2015' => '2015'
                ])?>

                <?= $form->field($model, 'pekerjaan') ?>

                <?= $form->field($model, 'alamat_rumah') ?>

                <?= $form->field($model, 'alamat_domilisi') ?>

                <?= $form->field($model, 'no_hp') ?>

                <?= $form->field($model, 'id_line') ?>

                <?= $form->field($model, 'foto')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
