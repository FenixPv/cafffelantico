<?php

namespace app\modules\site\controllers;

use app\modules\cpanel\models\LoginForm;
use app\modules\cpanel\models\Page;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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

    /**
     * @return string
     * @noinspection PhpUnused
     */
    public function actionHistory(): string
    {
        return $this->render('history');
    }

    /**
     * @param $link
     * @return string
     * @throws NotFoundHttpException
     * @noinspection PhpUnused
     */
    public function actionPage($link): string
    {
        return $this->render('view', [
            'model' => $this->findModel($link),
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel($link): ?Page
    {
        if (($model = Page::findOne(['link' => $link])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
