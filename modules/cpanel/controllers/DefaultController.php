<?php

namespace app\modules\cpanel\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `cpanel` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     * @throws ForbiddenHttpException
     */
    public function actionIndex(): string
    {
        if (!Yii::$app->user->can('allowCpanel')) {
            $this->redirect('/login');
        }
        return $this->render('index');
    }
}
