<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SearchForm extends Model
{
    public $query;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['query'], 'required'],
            ['query', 'string', 'length' => [3], 'tooShort' => Yii::t('model', 'Write atleast 3 symbols')],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'query' => Yii::t('model', 'Query'),
        ];
    }
}
