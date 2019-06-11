<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_components_settings".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 */
class AdminComponentsSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_components_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['name', 'value'], 'string', 'max' => 255],
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
            'value' => Yii::t('model', 'Value'),
        ];
    }
}
