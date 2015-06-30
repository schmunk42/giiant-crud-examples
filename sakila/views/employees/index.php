<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var giiant\sakila\models\search\Employees $searchModel
*/

    $this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="employees-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">

                                                                                                                                                                                                
            <?= 
            \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id'       => 'giiant-relations',
                    'encodeLabel' => false,
                    'label'    => '<span class="glyphicon glyphicon-paperclip"></span> ' . Yii::t('app', 'Relations'),
                    'dropdown' => [
                        'options'      => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items'        => [
    [
        'label' => '<i class="glyphicon glyphicon-random"> Dept Emp</i>',
        'url' => [
            'dept-emp/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Departments</i>',
        'url' => [
            'departments/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-random"> Dept Manager</i>',
        'url' => [
            'dept-manager/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Departments</i>',
        'url' => [
            'departments/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Salaries</i>',
        'url' => [
            'salaries/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Titles</i>',
        'url' => [
            'titles/index',
        ],
    ],
]                    ],
                ]
            );
            ?>        </div>
    </div>

    
        <div class="panel panel-default">
            <div class="panel-heading">
                Employees            </div>

            <div class="panel-body">

                <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager'        => [
                    'class'          => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => Yii::t('app', 'First'),
                    'lastPageLabel'  => Yii::t('app', 'Last')                ],
                'filterModel' => $searchModel,
                'columns' => [

                        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			'emp_no',
			'birth_date',
			'first_name',
			'last_name',
			'gender',
			'hire_date',
                ],
            ]); ?>
                </div>

            </div>

        </div>


    
</div>
