<?php

namespace common\columns;

use kartik\daterange\DateRangePicker;

class DatetimeColumn extends \yii\grid\DataColumn
{
    public $format = 'datetime';
    public $attribute = 'created_at';

    public function init()
    {
        parent::init();
        $this->filter = DateRangePicker::widget([
            'model' => $this->grid->filterModel,
            'attribute' => 'range',
            'startAttribute' => 'start_date',
            'endAttribute' => 'finish_date',
            'presetDropdown' => true,
            'convertFormat' => true,
            'pluginOptions' => [
                'locale' => [
                    'format' => 'd.m.Y'
                ],
            ],
        ]);
    }
}