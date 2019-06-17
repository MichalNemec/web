<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "roles".
 *
 * @property string $id
 * @property string $name
 * @property string $inserted_at
 * @property string $updated_at
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'inserted_at', 'updated_at'], 'required'],
            [['inserted_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'name' => Yii::t('model', 'Name'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    public static function getAllRoles()
    {
        return self::find()->all();
    }

    public static function getAllRolesForSelect()
    {
        $row = self::find()->where(['!=', 'name', 'superadmin'])->all();
        return ArrayHelper::map($row, 'id', 'title');
    }

    public static function getAllRoleIds()
    {
        $row = self::find()->select('id')->all();

        return ArrayHelper::getColumn($row, 'id');
    }
}
