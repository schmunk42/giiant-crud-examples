<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\world\models\CountryLanguage $model
 */

$this->title = 'Country Language ' . $model->CountryCode . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Country Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->CountryCode, 'url' => ['view', 'CountryCode' => $model->CountryCode, 'Language' => $model->Language]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="country-language-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'CountryCode' => $model->CountryCode, 'Language' => $model->Language], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
