<?php

namespace app\modules\cpanel;

/**
 * cpanel module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\cpanel\controllers';

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        // custom initialization code goes here
    }
}
