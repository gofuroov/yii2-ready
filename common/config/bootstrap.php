<?php
#Load ENV variables
(Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2)))->safeLoad();

#Aliasses
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(__DIR__, 2) . '/frontend');
Yii::setAlias('@backend', dirname(__DIR__, 2) . '/backend');
Yii::setAlias('@console', dirname(__DIR__, 2) . '/console');
Yii::setAlias('@api', dirname(__DIR__, 2) . '/api');

Yii::setAlias('@uploads', dirname(__DIR__, 2) . '/frontend/web/uploads');
Yii::setAlias('@storage', dirname(__DIR__, 2) . '/common/storage');
