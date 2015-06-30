<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\world\models\Country $model
 */

$this->title = 'Country ' . $model->Name . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->Name, 'url' => ['view', 'Code' => $model->Code]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="country-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'Code' => $model->Code], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
