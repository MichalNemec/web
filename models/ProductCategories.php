<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_categories".
 *
 * @property string $category_id
 * @property string $product_id
 * @property string $inserted_at
 * @property string $updated_at
 *
 * @property Categories $category
 * @property Products $product
 */
class ProductCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'product_id', 'inserted_at', 'updated_at'], 'required'],
            [['category_id', 'product_id'], 'integer'],
            [['inserted_at', 'updated_at'], 'safe'],
            [['category_id', 'product_id'], 'unique', 'targetAttribute' => ['category_id', 'product_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('model', 'Category ID'),
            'product_id' => Yii::t('model', 'Product ID'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
