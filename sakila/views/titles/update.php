<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\sakila\models\Titles $model
 */

$this->title = 'Titles ' . $model->title . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'emp_no' => $model->emp_no, 'title' => $model->title, 'from_date' => $model->from_date]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="titles-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'emp_no' => $model->emp_no, 'title' => $model->title, 'from_date' => $model->from_date], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
