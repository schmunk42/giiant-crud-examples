<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var giiant\sakila\models\search\Employees $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="employees-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'emp_no') ?>

		<?= $form->field($model, 'birth_date') ?>

		<?= $form->field($model, 'first_name') ?>

		<?= $form->field($model, 'last_name') ?>

		<?= $form->field($model, 'gender') ?>

		<?php // echo $form->field($model, 'hire_date') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
