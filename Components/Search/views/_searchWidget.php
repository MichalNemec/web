<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'search-form',
]);
?>
<div class="uk-margin">
    <div class="uk-inline">
        <?= \yii\helpers\Html::submitButton('', [
                'class' => 'uk-form-icon uk-form-icon-flip uk-position-absolute',
                'uk-icon' => 'icon: search'
        ]) ?>
        <?= $form->field($model, 'query', [
            'template' => '{input}</div></div>{error}'
        ])->textInput([
            'class' => 'uk-input',
            'placeholder' => 'Vyhledat informace'
        ])->label(false) ?>
    <!--/div-->
</div>
<?php ActiveForm::end(); ?>
