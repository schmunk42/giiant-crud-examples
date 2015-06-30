<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\Departments $model
*/

$this->title = 'Departments ' . $model->dept_no;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->dept_no, 'url' => ['view', 'dept_no' => $model->dept_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="departments-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'dept_no' => $model->dept_no],['class' => 'btn btn-info']) ?>
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
                        <?= $model->dept_no ?>        </div>

        <div class="panel-body">



    <?php $this->beginBlock('giiant\sakila\models\Departments'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'dept_no',
			'dept_name',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'dept_no' => $model->dept_no],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('EmpNos'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Emp Nos',
            ['employees/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Emp No',
            ['employees/create', 'EmpNo' => ['emp_no' => $model->dept_no]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-link"></span> ' . Yii::t('app', 'Attach') . ' Emp No', ['dept-emp/create', 'DeptEmp'=>['dept_no'=>$model->dept_no]],
            ['class'=>'btn btn-info btn-xs']
        ) ?>
</div></div><?php Pjax::begin(['id'=>'pjax-EmpNos', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-EmpNos ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getDeptEmps(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-deptemps']]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => Yii::t('app', 'First'),
        'lastPageLabel'  => Yii::t('app', 'Last')
    ],
    'columns' => [[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {delete}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'dept-emp' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        'delete' => function ($url, $model) {
                return yii\helpers\Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                    'class' => 'text-danger',
                    'title'         => Yii::t('app', 'Remove'),
                    'data-confirm'  => Yii::t('app', 'Are you sure you want to delete the related item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            },
'view' => function ($url, $model) {
                return yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-cog"></span>',
                    $url,
                    [
                        'data-title'  => Yii::t('app', 'View Pivot Record'),
                        'data-toggle' => 'tooltip',
                        'data-pjax'   => '0',
                        'class'       => 'text-muted',
                    ]
                );
            },
    ],
    'controller' => 'dept-emp'
],// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "emp_no",
            "value" => function($model){
                if ($rel = $model->getEmpNo()->one()) {
                    return yii\helpers\Html::a($rel->emp_no,["employees/view", 'emp_no' => $rel->emp_no,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'from_date',
			'to_date',
]
]).'</div>'?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('EmpNos0'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Emp Nos0',
            ['employees/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Emp Nos0',
            ['employees/create', 'EmpNos0' => ['emp_no' => $model->dept_no]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-link"></span> ' . Yii::t('app', 'Attach') . ' Emp Nos0', ['dept-manager/create', 'DeptManager'=>['dept_no'=>$model->dept_no]],
            ['class'=>'btn btn-info btn-xs']
        ) ?>
</div></div><?php Pjax::begin(['id'=>'pjax-EmpNos0', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-EmpNos0 ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getDeptManagers(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-deptmanagers']]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => Yii::t('app', 'First'),
        'lastPageLabel'  => Yii::t('app', 'Last')
    ],
    'columns' => [[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {delete}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'dept-manager' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        'delete' => function ($url, $model) {
                return yii\helpers\Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                    'class' => 'text-danger',
                    'title'         => Yii::t('app', 'Remove'),
                    'data-confirm'  => Yii::t('app', 'Are you sure you want to delete the related item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            },
'view' => function ($url, $model) {
                return yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-cog"></span>',
                    $url,
                    [
                        'data-title'  => Yii::t('app', 'View Pivot Record'),
                        'data-toggle' => 'tooltip',
                        'data-pjax'   => '0',
                        'class'       => 'text-muted',
                    ]
                );
            },
    ],
    'controller' => 'dept-manager'
],// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "emp_no",
            "value" => function($model){
                if ($rel = $model->getEmpNo()->one()) {
                    return yii\helpers\Html::a($rel->emp_no,["employees/view", 'emp_no' => $rel->emp_no,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'from_date',
			'to_date',
]
]).'</div>'?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Departments',
    'content' => $this->blocks['giiant\sakila\models\Departments'],
    'active'  => true,
],[
    'content' => $this->blocks['EmpNos'],
    'label'   => '<small>Emp Nos <span class="badge badge-default">'.count($model->getEmpNos()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['EmpNos0'],
    'label'   => '<small>Emp Nos0 <span class="badge badge-default">'.count($model->getEmpNos0()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
