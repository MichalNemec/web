<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_components".
 *
 * @property int $id
 * @property string $component
 * @property int $active
 */
class AdminComponents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_components';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['component', 'active'], 'required'],
            [['active'], 'integer'],
            [['component'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'component' => Yii::t('model', 'Component'),
            'active' => Yii::t('model', 'Active'),
        ];
    }

    public static function isEnabled($component)
    {
        $componentRow = self::findOne(['component' => $component]);
        if($componentRow) {
            return $componentRow->active ? true : false;
        }
        else {
            return true;
        }
    }
}
