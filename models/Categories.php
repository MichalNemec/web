<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $parent_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Categories $parent
 * @property Categories[] $categories
 * @property ProductCategories[] $productCategories
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    public $products_count;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => Yii::t('model', 'Parent ID'),
            'created_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
            'slug' => Yii::t('model', 'Slug'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Categories::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'parent_id']);
        //return $this->hasOne(Categories::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategories::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('product_categories', ['category_id' => 'id']);
    }

    public function getParentTitle()
    {
        if($this->parent_id != null) {
            return $this->parent->name;
        }

        return '';
    }

    public static function getHeadCategories()
    {
        $row = self::findAll(['parent_id' => null]);

        return ArrayHelper::map($row, 'id', 'name');
    }

    public static function getAllCategories($withFormatting = false)
    {
        $row = self::find()->all();

        if($withFormatting) {
            $data = ArrayHelper::toArray($row, [
                'app\models\Categories' => [
                    'id',
                    'name' => function ($category) {
                        if($category->parent_id) {
                            return $category->name.' '.Yii::t('admin', '(Parent category: {parentTitle})', [
                                    'parentTitle' => $category->parentTitle,
                                ]);
                        }
                        else {
                            return $category->name;
                        }
                    },
                ],
            ]);
            return ArrayHelper::map($data, 'id', 'name');
        }

        return ArrayHelper::map($row, 'id', 'name');
    }
}
