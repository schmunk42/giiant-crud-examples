<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\world\models\City $model
 */

$this->title = 'City ' . $model->Name . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->Name, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="city-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'ID' => $model->ID], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
