<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sessions".
 *
 * @property string $id
 * @property string $data
 * @property string $inserted_at
 * @property string $updated_at
 *
 * @property SalesOrders[] $salesOrders
 */
class Sessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inserted_at', 'updated_at'], 'required'],
            [['data'], 'string'],
            [['inserted_at', 'updated_at'], 'safe'],
            [['id'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'data' => Yii::t('model', 'Data'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesOrders()
    {
        return $this->hasMany(SalesOrders::className(), ['session_id' => 'id']);
    }
}
