<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\Customer $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
                <?= $model->customer_id ?>    </div>

    <div class="panel-body">

        <div class="customer-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Customer',
            'layout' => 'horizontal',
            'enableClientValidation' => false,
            ]
            );
            ?>

            <div class="">
                <?php echo $form->errorSummary($model); ?>
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'store_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(giiant\sakila\models\Store::find()->all(),'store_id','store_id'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'address_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(giiant\sakila\models\Address::find()->all(),'address_id','address_id'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'create_date')->textInput() ?>
			<?= $form->field($model, 'active')->textInput() ?>
			<?= $form->field($model, 'last_update')->textInput() ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Customer',
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
