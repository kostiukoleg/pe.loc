<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\file\FileInput;
use yii\helpers\Url;
use backend\models\Emails;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= 
                    //$model = new Emails();
                   FileInput::widget([
                        'name' => 'file[]',
                        'options' => ['multiple' => true, /*'accept' => 'image/*'*/],
                        'model' => $model,
                        'attribute' => 'attachment[]',
                        'pluginOptions' => [
                            'browseClass' => 'btn btn-success',
                            'uploadClass' => 'btn btn-info',
                            'removeClass' => 'btn btn-danger',
                            'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
                            'uploadUrl' => Url::to(['/site/file-upload']),
                            'showUpload' => false,
                            'maxFileCount' => 2,
                            'fileActionSettings' => [
                            'showUpload' => false,
                            //'showRemove' => true,
                            'previewFileType' => 'image'
                            ],

                        ],
                    ]); 
                ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
