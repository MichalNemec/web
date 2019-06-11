<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_orders".
 *
 * @property string $id
 * @property string $order_date
 * @property string $total
 * @property string $coupon_id
 * @property string $session_id
 * @property string $user_id
 * @property string $inserted_at
 * @property string $updated_at
 *
 * @property Sessions $session
 * @property Coupons $coupon
 * @property Sessions $session0
 * @property Users $user
 */
class SalesOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_date', 'total', 'session_id', 'user_id', 'inserted_at', 'updated_at'], 'required'],
            [['order_date', 'inserted_at', 'updated_at'], 'safe'],
            [['total'], 'number'],
            [['coupon_id', 'user_id'], 'integer'],
            [['session_id'], 'string', 'max' => 255],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sessions::className(), 'targetAttribute' => ['session_id' => 'id']],
            [['coupon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coupons::className(), 'targetAttribute' => ['coupon_id' => 'id']],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sessions::className(), 'targetAttribute' => ['session_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'order_date' => Yii::t('model', 'Order Date'),
            'total' => Yii::t('model', 'Total'),
            'coupon_id' => Yii::t('model', 'Coupon ID'),
            'session_id' => Yii::t('model', 'Session ID'),
            'user_id' => Yii::t('model', 'User ID'),
            'inserted_at' => Yii::t('model', 'Inserted At'),
            'updated_at' => Yii::t('model', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(Sessions::className(), ['id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupon()
    {
        return $this->hasOne(Coupons::className(), ['id' => 'coupon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession0()
    {
        return $this->hasOne(Sessions::className(), ['id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
