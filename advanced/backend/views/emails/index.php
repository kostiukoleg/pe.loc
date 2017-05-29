<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Написати листа', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
            'receiver_name',
            'receiver_email:email',
            'subject',
            'content:ntext',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    $arr = explode("|", $data->attachment);
                     
                    foreach ($arr as $link) {
                       return Html::img(Url::to('@web/attachments/'.$data->id."/".$link),[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => 'width:100px;'
                        ]);
                    }

                },
            ],

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}{link}',
            ],
        ],
    ]); ?>
</div>
