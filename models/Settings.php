<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 */
class Settings extends \yii\db\ActiveRecord
{
    const SETTING_defaultCurrency = 'defaultCurrency';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['value'], 'string'],
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
            'value' => Yii::t('model', 'Value'),
        ];
    }

    public static function getSetting($constant)
    {
        $row = self::findOne(['name' => $constant]);
        if($row){
            return $row->value;
        }
        return false;
    }
}
