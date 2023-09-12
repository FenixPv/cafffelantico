<?php

namespace app\modules\cpanel\models;

use Yii;
use yii\base\Model;

/**
 *
 * @property-read bool|User $user
 */
class LoginForm extends Model
{
    public string|null $login = null;
    public string|null $password = null;
    public bool $rememberMe = true;

    private bool|User $_user = false;

    public function rules(): array
    {
        return [
            [['login', 'password'], 'required' ],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @return void
     * @noinspection PhpUnused
     */
    public function validatePassword(): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', 'Неверное имя пользователя или пароль.');
            } elseif ($user && $user->status == User::STATUS_BLOCKED) {
                $this->addError('username', 'Ваш аккаунт заблокирован.');
            }
        }
    }

    public function login(): bool
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }

    public function getUser(): bool|User|null
    {
        if ($this->_user === false) {
            $this->_user = User::findByLogin($this->login);
        }

        return $this->_user;
    }

}