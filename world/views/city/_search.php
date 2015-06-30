<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var giiant\world\models\search\City $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="city-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'ID') ?>

		<?= $form->field($model, 'Name') ?>

		<?= $form->field($model, 'CountryCode') ?>

		<?= $form->field($model, 'District') ?>

		<?= $form->field($model, 'Population') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
