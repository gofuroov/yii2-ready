<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 08/01/22
 * Time: 15:50
 */

namespace console\controllers;

use common\models\User;
use console\models\AdminSignupForm;
use yii\helpers\Console;

class AppController extends \yii\console\Controller
{
    public function actionAdminCreateInteractive(): void
    {
        $form = new AdminSignupForm();

        Console::output("******************************");
        Console::output("* Created by Olimjon Gofurov *");
        Console::output("******************************\n\n");

        do {
            Console::output($form->getFirstError("username"));
            $form->username = Console::input($form->getAttributeLabel('username') . ": ");
        } while (!$form->validate(['username']));
        do {
            Console::output($form->getFirstError("first_name"));
            $form->first_name = Console::input($form->getAttributeLabel('first_name') . ": ");
        } while (!$form->validate(['first_name']));
        do {
            Console::output($form->getFirstError("last_name"));
            $form->last_name = Console::input($form->getAttributeLabel('last_name') . ": ");
        } while (!$form->validate(['last_name']));
        do {
            Console::output($form->getFirstError("phone"));
            Console::output("Namuna: +998 99 999 59 98");
            $form->phone = Console::input($form->getAttributeLabel('phone') . ": ");
        } while (!$form->validate(['phone']));
        do {
            Console::output($form->getFirstError("password"));
            $form->password = Console::input($form->getAttributeLabel('password') . ": ");
        } while (!$form->validate(['password']));

        if ($form->validate() && $form->save()) {
            Console::output("\n\n");
            Console::output("*********************************");
            Console::output("* Saqlandi: {$form->first_name} {$form->last_name} *");
            Console::output("*********************************\n\n");
            exit();
        }

        foreach ($form->getErrorSummary(true) as $error) {
            Console::output($error);
        }
    }

    /**
     * @throws \yii\base\Exception
     */
    public function actionAdminCreate(string $username, string $first_name, string $last_name, string $phone, string $password): void
    {
        $form = new AdminSignupForm([
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'password' => $password,
        ]);

        if ($form->save()) {
            Console::output("* Saqlandi: $form->username");
            exit();
        }

        foreach ($form->getErrorSummary(true) as $error) {
            Console::output($error);
        }
    }

}