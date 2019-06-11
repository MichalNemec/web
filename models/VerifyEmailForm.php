<?php

namespace app\models;

use yii\base\Model;

class VerifyEmailForm extends Model
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var Users
     */
    public $user;

    /**
     * Verify email
     *
     * @return User|null the saved model or null if saving fails
     */
    public function verifyEmail()
    {
        $this->user->status = Users::STATUS_ACTIVE;
        return $this->user->save(false) ? $this->user : null;
    }
}