<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ConferenceHasUser]].
 *
 * @see ConferenceHasUser
 */
class ConferenceHasUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ConferenceHasUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ConferenceHasUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}