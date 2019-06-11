<?php
namespace app\models;

use yii\base\Model;
/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    /**
     * @var \app\models\Users
     */
    public $user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     * @throws \yii\base\Exception
     */
    public function resetPassword()
    {
        $this->user->setPassword($this->password);
        $this->user->removePasswordResetToken();
        return $this->user->save(false);
    }
}