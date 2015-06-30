<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\sakila\models\DeptManager $model
 */

$this->title = 'Dept Manager ' . $model->dept_no . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Dept Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->dept_no, 'url' => ['view', 'dept_no' => $model->dept_no, 'emp_no' => $model->emp_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="dept-manager-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'dept_no' => $model->dept_no, 'emp_no' => $model->emp_no], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
