<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 09/01/22
 * Time: 14:01
 */

namespace backend\controllers;

use common\models\forms\UserSettingsForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class UserController extends BaseController
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'store-main' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $settings = new UserSettingsForm(['scenario' => UserSettingsForm::SCENARIO_MAIN]);

        if ($this->request->isPost && $settings->load($this->request->post()) && $settings->save()) {
            \Yii::$app->session->setFlash("success", "Ma'lumotlar saqlandi.");
            return $this->refresh();
        }

        return $this->render('index', [
            'settings' => $settings
        ]);
    }

    public function actionAvatar()
    {
        $settings = new UserSettingsForm(['scenario' => UserSettingsForm::SCENARIO_AVATAR]);

        if ($this->request->isPost) {
            $settings->photo = UploadedFile::getInstance($settings, 'photo');
            if ($settings->validate() && $settings->upload()) {
                \Yii::$app->session->setFlash("success", "Ma'lumotlar saqlandi.");
                return $this->refresh();
            }
            \Yii::$app->session->setFlash("danger", "Ma'lumotlarni saqlashda xato.");
        }

        return $this->render('avatar', [
            'settings' => $settings
        ]);
    }

    public function actionPassword()
    {
        $settings = new UserSettingsForm(['scenario' => UserSettingsForm::SCENARIO_PASSWORD]);

        if ($this->request->isPost && $settings->load($this->request->post()) && $settings->save()) {
            \Yii::$app->session->setFlash("success", "Ma'lumotlar saqlandi.");
            return $this->refresh();
        }

        return $this->render('password', [
            'settings' => $settings
        ]);
    }

    public function actionResetAvatar(): \yii\web\Response
    {
        $settings = new UserSettingsForm();
        $settings->resetAvatar();

        return $this->redirect(['user/index']);
    }
}