<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coupons".
 *
 * @property string $id
 * @property string $code
 * @property string $description
 * @property int $active
 * @property string $value
 * @property int $multiple
 * @property string $start_date
 * @property string $end_date
 * @property string $inserted_at
 * @property string $updated_at
 */
class Coupons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coupons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'inserted_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['active', 'multiple'], 'integer'],
            [['value'], 'number'],
            [['start_date', 'end_date', 'inserted_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'code' => Yii::t('model', 'Code'),
            'description' => Yii::t('model', 'Description'),
            'active' => Yii::t('model', 'Active'),
            'value' => Yii::t('model', 'Value'),
            'multiple' => Yii::t('model', 'Multiple'),
            'start_date' => Yii::t('model', 'Start Date'),
            'end_date' => Yii::t('model', 'End Date'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }
}
