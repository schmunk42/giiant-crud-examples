<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\Titles $model
*/

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => 'Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titles-create">

    <p class="pull-left">
        <?= Html::a(Yii::t('app', 'Cancel'), \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
