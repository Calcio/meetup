<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userId')->dropDownlist(
        ArrayHelper::map(User::find()->all(), 'id', 'username')
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'born')->textInput() ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
