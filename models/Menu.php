<?php

namespace app\models;

use app\modules\admin\components\Helpers\Helpers;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $subtitle
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property int $parent_id
 * @property int $active
 * @property int $linkActive
 *
 * @property Menu $parent
 * @property Menu[] $menus
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subtitle', 'title', 'text'], 'required'],
            [['text'], 'string'],
            [['parent_id', 'active', 'linkActive'], 'integer'],
            [['subtitle', 'title', 'slug'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'subtitle' => Yii::t('model', 'Subtitle'),
            'title' => Yii::t('model', 'Title'),
            'slug' => Yii::t('model', 'Slug'),
            'text' => Yii::t('model', 'Text'),
            'parent_id' => Yii::t('model', 'Parent ID'),
            'active' => Yii::t('model', 'Active'),
            'linkActive' => Yii::t('model', 'Link Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['parent_id' => 'id']);
    }

    public function getParentTitle()
    {
        if ($this->parent_id != null) {
            return $this->parent_id->title;
        }

        return '';
    }

    public static function getHeadMenuItems()
    {
        $row = self::findAll(['parent_id' => null]);

        return ArrayHelper::map($row, 'id', 'title');
    }

    public static function getFrontendMenu()
    {
        $rows = self::find()->where(['active' => true, 'parent_id' => null])->orderBy('position ASC')->all();
        $data = ArrayHelper::toArray($rows, [
            'app\models\Menu' => [
                'id',
                'title',
                'slug' => function ($menu) {
                    if ($menu->linkActive) {
                        return $menu->slug;
                    } else {
                        return '#';
                    }
                },
                'children' => function ($menu) {
                    return self::find()->where(['active' => true, 'parent_id' => $menu->id])->orderBy('position ASC')->all();
                },
            ],
        ]);

        return $data;
    }
}
