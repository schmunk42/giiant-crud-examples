<?php

namespace giiant\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use giiant\sakila\models\Departments as DepartmentsModel;

/**
* Departments represents the model behind the search form about `giiant\sakila\models\Departments`.
*/
class Departments extends DepartmentsModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['dept_no', 'dept_name'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = DepartmentsModel::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere(['like', 'dept_no', $this->dept_no])
            ->andFilterWhere(['like', 'dept_name', $this->dept_name]);

return $dataProvider;
}
}