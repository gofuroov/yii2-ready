<?php

namespace api\controllers;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * Displays homepage.
     */
    public function actionIndex(): \yii\web\Response
    {
        return $this->redirect(['v1/default/index']);
    }
}
