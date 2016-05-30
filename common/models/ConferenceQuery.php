<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Conference]].
 *
 * @see Conference
 */
class ConferenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Conference[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Conference|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}