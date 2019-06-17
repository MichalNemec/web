<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "product_tags".
 *
 * @property string $product_id
 * @property string $tag_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Products $product
 * @property Tags $tag
 */
class FakeProductTags extends Model
{
    public $tag_id;
    public $product_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['tag_id', 'required'],
            ['product_id', 'integer'],
            ['tag_id', 'each', 'rule' => ['integer']],
            [['created_at', 'updated_at'], 'safe'],
            //[['product_id', 'tag_id'], 'unique', 'targetAttribute' => ['product_id', 'tag_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            //[['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['tag_id' => 'id']],
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
            'created_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

}
