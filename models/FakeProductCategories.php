<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "product_categories".
 *
 * @property string $category_id
 * @property string $product_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Categories $category
 * @property Products $product
 */
class FakeProductCategories extends Model
{
    public $category_id;
    public $product_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            ['product_id', 'integer'],
            ['category_id', 'each', 'rule' => ['integer']],
            [['created_at', 'updated_at'], 'safe'],
            //[['category_id', 'product_id'], 'unique', 'targetAttribute' => ['category_id', 'product_id']],
            //[['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            //[['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
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
            'created_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

}
