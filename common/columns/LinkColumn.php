<?php

namespace common\columns;

use kartik\select2\Select2;
use yii\bootstrap4\Html;
use yii\helpers\Url;

class LinkColumn extends \yii\grid\DataColumn
{
    public ?string $relation = null;
    public ?string $relationAttribute = 'name';
    /**
     * @var null|string|array
     */
    public $relationUrl = null;
    public array $filterList = [];

    protected function renderDataCellContent($model, $key, $index): string
    {
        if ($this->relation && $model->hasMethod('get' . ucfirst($this->relation))) {
            if (!$this->relationUrl) {
                $this->relationUrl = Url::to(['/' . $this->relation . '/' . 'default/view', 'id' => $model->{$this->attribute}]);
            }
            return Html::a($model->{$this->relation}->{$this->relationAttribute}, $this->relationUrl, [
                'data-pjax' => 0
            ]);
        }
        return Html::a($model->{$this->attribute}, ["view", 'id' => $key], [
            'data-pjax' => 0
        ]);
    }

    protected function renderFilterCellContent()
    {
        if (!empty($this->filterList)) {
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
        return parent::renderFilterCellContent();
    }
}