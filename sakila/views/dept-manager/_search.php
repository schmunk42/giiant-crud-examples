<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var giiant\sakila\models\search\DeptManager $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="dept-manager-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'dept_no') ?>

		<?= $form->field($model, 'emp_no') ?>

		<?= $form->field($model, 'from_date') ?>

		<?= $form->field($model, 'to_date') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
