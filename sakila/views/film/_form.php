<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\Film $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
                <?= $model->title ?>    </div>

    <div class="panel-body">

        <div class="film-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Film',
            'layout' => 'horizontal',
            'enableClientValidation' => false,
            ]
            );
            ?>

            <div class="">
                <?php echo $form->errorSummary($model); ?>
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'language_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(giiant\sakila\models\Language::find()->all(),'language_id','name'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'rating')->dropDownList([ 'G' => 'G', 'PG' => 'PG', 'PG-13' => 'PG-13', 'R' => 'R', 'NC-17' => 'NC-17', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'special_features')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'release_year')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'last_update')->textInput() ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'original_language_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(giiant\sakila\models\Language::find()->all(),'language_id','name'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'rental_duration')->textInput() ?>
			<?= $form->field($model, 'length')->textInput() ?>
			<?= $form->field($model, 'rental_rate')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'replacement_cost')->textInput(['maxlength' => true]) ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Film',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
                <hr/>

                <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord
                ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
                [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-success'
                ]
                );
                ?>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>
