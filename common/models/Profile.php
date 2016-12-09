<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $name
 * @property string $born
 * @property string $twitter
 * @property string $facebook
 * @property string $avatar
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'name'], 'required'],
            [['userId'], 'integer'],
            [['born'], 'safe'],
            [['name', 'avatar'], 'string', 'max' => 80],
            [['twitter', 'facebook'], 'string', 'max' => 40],
            [['name'], 'unique'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User',
            'name' => 'Name',
            'born' => 'Born',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'avatar' => 'Avatar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
