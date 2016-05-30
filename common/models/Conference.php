<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\models\ConferenceQuery;

/**
 * Модель конференции
 *
 * @property integer $id
 * @property string $title
 * @property integer $active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ConferenceHasUser[] $conferenceHasUsers
 */
class Conference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'updated_at'], 'required'],
            [['active', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'active' => Yii::t('app', 'Active'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferenceHasUsers()
    {
        return $this->hasMany(ConferenceHasUser::className(), ['conference_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ConferenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConferenceQuery(get_called_class());
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
