<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\world\models\Country $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
                <?= $model->Name ?>    </div>

    <div class="panel-body">

        <div class="country-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Country',
            'layout' => 'horizontal',
            'enableClientValidation' => false,
            ]
            );
            ?>

            <div class="">
                <?php echo $form->errorSummary($model); ?>
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'Code')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'Continent')->dropDownList([ 'Asia' => 'Asia', 'Europe' => 'Europe', 'North America' => 'North America', 'Africa' => 'Africa', 'Oceania' => 'Oceania', 'Antarctica' => 'Antarctica', 'South America' => 'South America', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'SurfaceArea')->textInput() ?>
			<?= $form->field($model, 'LifeExpectancy')->textInput() ?>
			<?= $form->field($model, 'GNP')->textInput() ?>
			<?= $form->field($model, 'GNPOld')->textInput() ?>
			<?= $form->field($model, 'IndepYear')->textInput() ?>
			<?= $form->field($model, 'Population')->textInput() ?>
			<?= $form->field($model, 'Capital')->textInput() ?>
			<?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'Region')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'LocalName')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'GovernmentForm')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'HeadOfState')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'Code2')->textInput(['maxlength' => true]) ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Country',
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
