<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\City $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
                <?= $model->city_id ?>    </div>

    <div class="panel-body">

        <div class="city-form">

            <?php $form = ActiveForm::begin([
            'id' => 'City',
            'layout' => 'horizontal',
            'enableClientValidation' => false,
            ]
            );
            ?>

            <div class="">
                <?php echo $form->errorSummary($model); ?>
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'country_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(giiant\sakila\models\Country::find()->all(),'country_id','country_id'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'last_update')->textInput() ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'City',
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
