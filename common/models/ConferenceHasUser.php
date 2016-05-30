<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * Модель связи конференции и участников
 *
 * @property integer $id
 * @property integer $conference_id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Conference $conference
 * @property User $user
 */
class ConferenceHasUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conference_has_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conference_id', 'user_id'], 'required'],
            [['conference_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['conference_id', 'user_id'], 'unique', 'targetAttribute' => ['conference_id', 'user_id'], 'message' => 'The combination of Conference ID and User ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'conference_id' => Yii::t('app', 'Conference ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConference()
    {
        return $this->hasOne(Conference::className(), ['id' => 'conference_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return ConferenceHasUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConferenceHasUserQuery(get_called_class());
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
