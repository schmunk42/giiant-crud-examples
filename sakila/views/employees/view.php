<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var giiant\sakila\models\Employees $model
*/

$this->title = 'Employees ' . $model->emp_no;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->emp_no, 'url' => ['view', 'emp_no' => $model->emp_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="employees-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'emp_no' => $model->emp_no],['class' => 'btn btn-info']) ?>
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
                        <?= $model->emp_no ?>        </div>

        <div class="panel-body">



    <?php $this->beginBlock('giiant\sakila\models\Employees'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'emp_no',
			'birth_date',
			'first_name',
			'last_name',
			'gender',
			'hire_date',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'emp_no' => $model->emp_no],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('DeptNos'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Dept Nos',
            ['departments/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Dept No',
            ['departments/create', 'DeptNo' => ['dept_no' => $model->emp_no]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-link"></span> ' . Yii::t('app', 'Attach') . ' Dept No', ['dept-emp/create', 'DeptEmp'=>['emp_no'=>$model->emp_no]],
            ['class'=>'btn btn-info btn-xs']
        ) ?>
</div></div><?php Pjax::begin(['id'=>'pjax-DeptNos', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-DeptNos ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
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
            "attribute" => "dept_no",
            "value" => function($model){
                if ($rel = $model->getDeptNo()->one()) {
                    return yii\helpers\Html::a($rel->dept_no,["departments/view", 'dept_no' => $rel->dept_no,],["data-pjax"=>0]);
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


<?php $this->beginBlock('DeptNos0'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Dept Nos0',
            ['departments/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Dept Nos0',
            ['departments/create', 'DeptNos0' => ['dept_no' => $model->emp_no]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-link"></span> ' . Yii::t('app', 'Attach') . ' Dept Nos0', ['dept-manager/create', 'DeptManager'=>['emp_no'=>$model->emp_no]],
            ['class'=>'btn btn-info btn-xs']
        ) ?>
</div></div><?php Pjax::begin(['id'=>'pjax-DeptNos0', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-DeptNos0 ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
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
            "attribute" => "dept_no",
            "value" => function($model){
                if ($rel = $model->getDeptNo()->one()) {
                    return yii\helpers\Html::a($rel->dept_no,["departments/view", 'dept_no' => $rel->dept_no,],["data-pjax"=>0]);
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


<?php $this->beginBlock('Salaries'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Salaries',
            ['salaries/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Salary',
            ['salaries/create', 'Salary' => ['emp_no' => $model->emp_no]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-Salaries', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Salaries ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getSalaries(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-salaries']]),
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
        $params[0] = 'salaries' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        
    ],
    'controller' => 'salaries'
],			'salary',
			'from_date',
			'to_date',
]
]).'</div>'?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('Titles'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Titles',
            ['titles/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Title',
            ['titles/create', 'Title' => ['emp_no' => $model->emp_no]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-Titles', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Titles ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?= '<div class="table-responsive">'.\yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getTitles(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-titles']]),
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
        $params[0] = 'titles' . '/' . $action;
        return Url::toRoute($params);
    },
    'buttons'    => [
        
    ],
    'controller' => 'titles'
],			'title',
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
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Employees',
    'content' => $this->blocks['giiant\sakila\models\Employees'],
    'active'  => true,
],[
    'content' => $this->blocks['DeptNos'],
    'label'   => '<small>Dept Nos <span class="badge badge-default">'.count($model->getDeptNos()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['DeptNos0'],
    'label'   => '<small>Dept Nos0 <span class="badge badge-default">'.count($model->getDeptNos0()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['Salaries'],
    'label'   => '<small>Salaries <span class="badge badge-default">'.count($model->getSalaries()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['Titles'],
    'label'   => '<small>Titles <span class="badge badge-default">'.count($model->getTitles()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
