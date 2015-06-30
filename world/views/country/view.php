<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\world\models\Country $model
*/

$this->title = 'Country ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->Name, 'url' => ['view', 'Code' => $model->Code]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="country-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'Code' => $model->Code],['class' => 'btn btn-info']) ?>
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



    <?php $this->beginBlock('giiant\world\models\Country'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'Code',
			'Name',
			'Continent',
			'Region',
			'SurfaceArea',
			'IndepYear',
			'Population',
			'LifeExpectancy',
			'GNP',
			'GNPOld',
			'LocalName',
			'GovernmentForm',
			'HeadOfState',
			'Capital',
			'Code2',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'Code' => $model->Code],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Cities'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Cities',
            ['city/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' City',
            ['city/create', 'City' => ['CountryCode' => $model->Code]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-Cities', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Cities ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getCities(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-cities']]),
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
        $params[0] = 'city' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        
    ],
    'controller' => 'city'
],			'ID',
			'Name',
			'District',
			'Population',
]
]).'</div>'?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('CountryLanguages'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Country Languages',
            ['country-language/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Country Language',
            ['country-language/create', 'CountryLanguage' => ['CountryCode' => $model->Code]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-CountryLanguages', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-CountryLanguages ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getCountryLanguages(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-countrylanguages']]),
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
        $params[0] = 'country-language' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        
    ],
    'controller' => 'country-language'
],			'Language',
			'IsOfficial',
			'Percentage',
]
]).'</div>'?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Country',
    'content' => $this->blocks['giiant\world\models\Country'],
    'active'  => true,
],[
    'content' => $this->blocks['Cities'],
    'label'   => '<small>Cities <span class="badge badge-default">'.count($model->getCities()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['CountryLanguages'],
    'label'   => '<small>Country Languages <span class="badge badge-default">'.count($model->getCountryLanguages()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
