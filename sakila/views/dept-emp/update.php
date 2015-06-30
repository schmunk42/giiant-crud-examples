<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\sakila\models\DeptEmp $model
 */

$this->title = 'Dept Emp ' . $model->emp_no . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Dept Emps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->emp_no, 'url' => ['view', 'emp_no' => $model->emp_no, 'dept_no' => $model->dept_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="dept-emp-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'emp_no' => $model->emp_no, 'dept_no' => $model->dept_no], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
