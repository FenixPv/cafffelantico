<?php

use yii\console\Application;
use yii\web\User;

/**
 * This class only exists here for IDE (PHPStorm/Netbeans/...) autocompletion.
 * This file is never included anywhere.
 * Adjust this file to match classes configured in your application config, to enable IDE autocompletion for custom components.
 * ```php
 * class __Rollbar {
 * }
 * ```
 */
class Yii {
    /**
     * @var \yii\web\Application|Application|__Application
     */
    public static Application|__Application|\yii\web\Application $app;
}

/**
 * @property yii\rbac\DbManager $authManager 
 * @property User|__WebUser $user
 * 
 */
class __Application {
}

/**
 * @property app\modules\user\models\User $identity
 */
class __WebUser {
}
