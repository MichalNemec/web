<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $sku
 * @property string $name
 * @property string $description
 * @property string $product_status_id
 * @property string $regular_price
 * @property string $discount_price
 * @property int $quantity
 * @property int $taxable
 * @property string $inserted_at
 * @property string $updated_at
 *
 * @property ProductCategories[] $productCategories
 * @property Categories[] $categories
 * @property ProductTags[] $productTags
 * @property Tags[] $tags
 * @property ProductStatuses $productStatus
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku', 'name', 'product_status_id', 'inserted_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['product_status_id', 'quantity', 'taxable'], 'integer'],
            [['regular_price', 'discount_price'], 'number'],
            [['inserted_at', 'updated_at'], 'safe'],
            [['sku', 'name'], 'string', 'max' => 255],
            [['product_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductStatuses::className(), 'targetAttribute' => ['product_status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'sku' => Yii::t('model', 'Sku'),
            'name' => Yii::t('model', 'Name'),
            'description' => Yii::t('model', 'Description'),
            'product_status_id' => Yii::t('model', 'Product Status ID'),
            'regular_price' => Yii::t('model', 'Regular Price'),
            'discount_price' => Yii::t('model', 'Discount Price'),
            'quantity' => Yii::t('model', 'Quantity'),
            'taxable' => Yii::t('model', 'Taxable'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategories::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id'])->viaTable('product_categories', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTags::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'tag_id'])->viaTable('product_tags', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductStatus()
    {
        return $this->hasOne(ProductStatuses::className(), ['id' => 'product_status_id']);
    }
}
