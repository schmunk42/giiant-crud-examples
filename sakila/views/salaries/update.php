<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\sakila\models\Salaries $model
 */

$this->title = 'Salaries ' . $model->emp_no . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->emp_no, 'url' => ['view', 'emp_no' => $model->emp_no, 'from_date' => $model->from_date]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="salaries-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'emp_no' => $model->emp_no, 'from_date' => $model->from_date], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
