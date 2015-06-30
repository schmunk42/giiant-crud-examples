<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\Address $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
                <?= $model->address_id ?>    </div>

    <div class="panel-body">

        <div class="address-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Address',
            'layout' => 'horizontal',
            'enableClientValidation' => false,
            ]
            );
            ?>

            <div class="">
                <?php echo $form->errorSummary($model); ?>
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'city_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(giiant\sakila\models\City::find()->all(),'city_id','city_id'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'last_update')->textInput() ?>
			<?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Address',
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