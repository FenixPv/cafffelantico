<?php

namespace app\modules\site\controllers;

use app\modules\cpanel\models\LoginForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `site` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return Response|string
     * @noinspection PhpUnused
     */
    public function actionLogin(): Response|string
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

}
