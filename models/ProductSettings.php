<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_settings".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 */
class ProductSettings extends \yii\db\ActiveRecord
{
    const SETTING_shippingWeight = 'shippingWeight';
    const SETTING_enabledVariants = 'enabledVariants';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_settings';
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

    public static function variantsEnabled()
    {
        $row = self::findOne(['name' => self::SETTING_enabledVariants]);
        if($row) {
            return $row->value == 'yes' ? true : false;
        }
    }

    public static function getSetting($constant)
    {
       $row = self::findOne(['name' => self::SETTING_shippingWeight]);
       if($row){
           return $row->value;
       }
       return false;
    }
}
