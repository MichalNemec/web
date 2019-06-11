<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_products".
 *
 * @property string $id
 * @property int $order_id
 * @property string $sku
 * @property string $name
 * @property string $description
 * @property string $price
 * @property int $quantity
 * @property string $subtotal
 * @property string $inserted_at
 * @property string $updated_at
 */
class OrderProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'quantity'], 'integer'],
            [['sku', 'name', 'price', 'quantity', 'subtotal', 'inserted_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['price', 'subtotal'], 'number'],
            [['inserted_at', 'updated_at'], 'safe'],
            [['sku', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'order_id' => Yii::t('model', 'Order ID'),
            'sku' => Yii::t('model', 'Sku'),
            'name' => Yii::t('model', 'Name'),
            'description' => Yii::t('model', 'Description'),
            'price' => Yii::t('model', 'Price'),
            'quantity' => Yii::t('model', 'Quantity'),
            'subtotal' => Yii::t('model', 'Subtotal'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }
}
