<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\Inventory $model
*/

$this->title = 'Inventory ' . $model->inventory_id;
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->inventory_id, 'url' => ['view', 'inventory_id' => $model->inventory_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="inventory-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'inventory_id' => $model->inventory_id],['class' => 'btn btn-info']) ?>
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
                        <?= $model->inventory_id ?>        </div>

        <div class="panel-body">



    <?php $this->beginBlock('giiant\sakila\models\Inventory'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'inventory_id',
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'film_id',
    'value' => ($model->getFilm()->one() ? Html::a($model->getFilm()->one()->title, ['film/view', 'film_id' => $model->getFilm()->one()->film_id,]) : '<span class="label label-warning">?</span>'),
],
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'store_id',
    'value' => ($model->getStore()->one() ? Html::a($model->getStore()->one()->store_id, ['store/view', 'store_id' => $model->getStore()->one()->store_id,]) : '<span class="label label-warning">?</span>'),
],
			'last_update',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'inventory_id' => $model->inventory_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Rentals'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Rentals',
            ['rental/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Rental',
            ['rental/create', 'Rental' => ['inventory_id' => $model->inventory_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-Rentals', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Rentals ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getRentals(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-rentals']]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => Yii::t('app', 'First'),
        'lastPageLabel'  => Yii::t('app', 'Last')
    ],
    'columns' => [[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'rental' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        
    ],
    'controller' => 'rental'
],			'rental_id',
			'rental_date',
// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "customer_id",
            "value" => function($model){
                if ($rel = $model->getCustomer()->one()) {
                    return yii\helpers\Html::a($rel->customer_id,["customer/view", 'customer_id' => $rel->customer_id,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'return_date',
// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "staff_id",
            "value" => function($model){
                if ($rel = $model->getStaff()->one()) {
                    return yii\helpers\Html::a($rel->staff_id,["staff/view", 'staff_id' => $rel->staff_id,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'last_update',
]
]).'</div>'?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Inventory',
    'content' => $this->blocks['giiant\sakila\models\Inventory'],
    'active'  => true,
],[
    'content' => $this->blocks['Rentals'],
    'label'   => '<small>Rentals <span class="badge badge-default">'.count($model->getRentals()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
