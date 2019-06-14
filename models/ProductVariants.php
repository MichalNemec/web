<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_variants".
 *
 * @property int $id
 * @property string $product_id
 * @property string $name
 * @property int $price
 *
 * @property Products $product
 */
class ProductVariants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_variants';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            //[['product_id', 'price'], 'integer'],
            [['name'], 'string', 'max' => 255],
            //[['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'product_id' => Yii::t('model', 'Product ID'),
            'name' => Yii::t('model', 'Name'),
            'price' => Yii::t('model', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

}
