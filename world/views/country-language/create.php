<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var giiant\world\models\CountryLanguage $model
*/

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => 'Country Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-language-create">

    <p class="pull-left">
        <?= Html::a(Yii::t('app', 'Cancel'), \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
