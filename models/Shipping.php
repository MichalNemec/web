<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipping".
 *
 * @property int $id
 * @property string $name
 * @property int $shippingType
 * @property int $value
 */
class Shipping extends \yii\db\ActiveRecord
{
    const TYPE_FLAT = 1;
    const TYPE_COMPUTED_BY_WEIGHT = 2;
    const TYPE_COMPUTED_BY_TYPE = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shipping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'shippingType', 'value'], 'required'],
            [['shippingType', 'value'], 'integer'],
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
            'shippingType' => Yii::t('model', 'Shipping Type'),
            'value' => Yii::t('model', 'Value'),
        ];
    }

    public static function getAllTypes($selectedType = null)
    {
        $types = [
            self::TYPE_FLAT => Yii::t('model', 'Flat'),
            self::TYPE_COMPUTED_BY_WEIGHT =>  Yii::t('model', 'Computed by Weight'),
            //self::TYPE_COMPUTED_BY_TYPE =>  Yii::t('model', 'Computed by Type')
        ];

        if($selectedType){
            return $types[$selectedType];
        }

        return $types;
    }
}
