<?php
namespace app\Components\Search;

use app\models\SearchForm;
use Yii;

class SearchWidget extends \yii\bootstrap\Widget
{

    public function run()
    {
        $model = new SearchForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->query = strip_tags($model->query);
            return Yii::$app->getResponse()->redirect('/search/'.$model->query,302)->send();
        }

        return $this->render('_searchWidget', [
            'model' => $model
        ]);
    }
}
