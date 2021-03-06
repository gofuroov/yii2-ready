<?php

namespace common\columns;

use kartik\select2\Select2;
use yii\base\Model;

class StatusColumn extends \yii\grid\DataColumn
{
    public $format = 'raw';
    public $attribute = 'status';
    public array $filterList = [];

    public function init()
    {
        parent::init();
    }

    protected function renderFilterCellContent()
    {
        return Select2::widget([
            'model' => $this->grid->filterModel,
            'attribute' => $this->attribute,
            'data' => $this->filterList,
            'options' => [
                'placeholder' => 'Tanlang...',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ]
        ]);
    }


    protected function renderDataCellContent($model, $key, $index): string
    {
        if (method_exists($model, 'getStatusName')) {
            return $model->getStatusName();
        }
        return parent::renderDataCellContent($model, $key, $index); // TODO: Change the autogenerated stub
    }


}