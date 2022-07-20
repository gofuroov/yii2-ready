<?php

namespace common\models\defaults;

class DefaultModel extends \yii\base\Model
{
    public function attributeLabels(): array
    {
        return DefaultActiveRecord::getAttributeLabels();
    }
}