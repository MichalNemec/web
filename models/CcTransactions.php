<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cc_transactions".
 *
 * @property string $id
 * @property string $code
 * @property int $order_id
 * @property string $transdate
 * @property string $processor
 * @property string $processor_trans_id
 * @property string $amount
 * @property string $cc_num
 * @property string $cc_type
 * @property string $response
 * @property string $inserted_at
 * @property string $updated_at
 */
class CcTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cc_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'processor', 'processor_trans_id', 'amount', 'inserted_at', 'updated_at'], 'required'],
            [['order_id'], 'integer'],
            [['transdate', 'inserted_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
            [['response'], 'string'],
            [['code', 'processor', 'processor_trans_id', 'cc_num', 'cc_type'], 'string', 'max' => 255],
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
            'order_id' => Yii::t('model', 'Order ID'),
            'transdate' => Yii::t('model', 'Transdate'),
            'processor' => Yii::t('model', 'Processor'),
            'processor_trans_id' => Yii::t('model', 'Processor Trans ID'),
            'amount' => Yii::t('model', 'Amount'),
            'cc_num' => Yii::t('model', 'Cc Num'),
            'cc_type' => Yii::t('model', 'Cc Type'),
            'response' => Yii::t('model', 'Response'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }
}
