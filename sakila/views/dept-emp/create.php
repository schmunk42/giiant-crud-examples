<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\DeptEmp $model
*/

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => 'Dept Emps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dept-emp-create">

    <p class="pull-left">
        <?= Html::a(Yii::t('app', 'Cancel'), \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
