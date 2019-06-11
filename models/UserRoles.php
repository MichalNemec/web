<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_roles".
 *
 * @property string $user_id
 * @property string $role_id
 * @property string $inserted_at
 * @property string $updated_at
 *
 * @property Users $user
 * @property Roles $role
 */
class UserRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id', 'inserted_at', 'updated_at'], 'required'],
            [['user_id', 'role_id'], 'integer'],
            [['inserted_at', 'updated_at'], 'safe'],
            [['user_id', 'role_id'], 'unique', 'targetAttribute' => ['user_id', 'role_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('model', 'User ID'),
            'role_id' => Yii::t('model', 'Role ID'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasMany(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasMany(Roles::className(), ['id' => 'role_id']);
    }

    public static function hasRole($rolesArray = null)
    {
        if(!empty($rolesArray) && is_array($rolesArray)){
            $userRoles = self::findAll(['user_id' => Yii::$app->user->identity->getId()]);
            $data = ArrayHelper::toArray($userRoles, [
                'app\models\UserRoles' => [
                    'roles' => function ($role) {
                        return ArrayHelper::map($role->role, 'id', 'name');
                    },
                ],
            ]);
            return (count(array_intersect($rolesArray, $data[0]['roles']))) ? true : false;
        }

        if(self::findOne(['user_id' => Yii::$app->user->identity->getId()])) {
            return true;
        }
        return false;
    }
}
