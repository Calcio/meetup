<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'userId',
                'value' => 'user.username',
            ],
            'name',
            'born',
            'twitter',
            // 'facebook',
            // 'avatar',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['class' => 'col-sm-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>
</div>
