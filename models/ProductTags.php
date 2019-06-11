<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_tags".
 *
 * @property string $product_id
 * @property string $tag_id
 * @property string $inserted_at
 * @property string $updated_at
 *
 * @property Products $product
 * @property Tags $tag
 */
class ProductTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'tag_id', 'inserted_at', 'updated_at'], 'required'],
            [['product_id', 'tag_id'], 'integer'],
            [['inserted_at', 'updated_at'], 'safe'],
            [['product_id', 'tag_id'], 'unique', 'targetAttribute' => ['product_id', 'tag_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('model', 'Product ID'),
            'tag_id' => Yii::t('model', 'Tag ID'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }
}
