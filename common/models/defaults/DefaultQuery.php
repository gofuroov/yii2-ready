<?php

namespace common\models\defaults;

use yii\db\ActiveQuery;

class DefaultQuery extends \yii\db\ActiveQuery
{
    public function active(): ActiveQuery
    {
        return $this->andWhere(['status' => DefaultActiveRecord::STATUS_ACTIVE]);
    }

    public function deleted(): ActiveQuery
    {
        return $this->andWhere(['status' => DefaultActiveRecord::STATUS_DELETED]);
    }

    public function inactive(): ActiveQuery
    {
        return $this->andWhere(['status' => DefaultActiveRecord::STATUS_INACTIVE]);
    }
}