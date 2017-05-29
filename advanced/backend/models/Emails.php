<?php

namespace backend\models;

use Yii;
use mongosoft\file\UploadBehavior;

/**
 * This is the model class for table "emails".
 *
 * @property integer $id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $subject
 * @property string $content
 * @property string $attachment
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email', 'subject', 'content'], 'required'],
            [['content'], 'string'],
            [['receiver_name', 'receiver_email', 'subject'], 'string', 'max' => 255],
            [['attachment'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver_name' => 'Имя получателя',
            'receiver_email' => 'Email получателя',
            'subject' => 'Тема заказа',
            'content' => 'Описание заказа',
            'attachment' => 'Фотографии',
        ];
    }
}
