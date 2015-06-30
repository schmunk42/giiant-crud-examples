<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\world\models\City $model
*/

$this->title = 'City ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->Name, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="city-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'ID' => $model->ID],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
                        <?= $model->Name ?>        </div>

        <div class="panel-body">



    <?php $this->beginBlock('giiant\world\models\City'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'ID',
			'Name',
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'CountryCode',
    'value' => ($model->getCountryCode()->one() ? Html::a($model->getCountryCode()->one()->Name, ['country/view', 'Code' => $model->getCountryCode()->one()->Code,]) : '<span class="label label-warning">?</span>'),
],
			'District',
			'Population',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'ID' => $model->ID],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> City',
    'content' => $this->blocks['giiant\world\models\City'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
