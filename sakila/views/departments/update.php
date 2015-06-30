<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var giiant\sakila\models\Departments $model
 */

$this->title = 'Departments ' . $model->dept_no . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->dept_no, 'url' => ['view', 'dept_no' => $model->dept_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="departments-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'dept_no' => $model->dept_no], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
