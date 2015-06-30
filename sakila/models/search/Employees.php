<?php

namespace giiant\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use giiant\sakila\models\Employees as EmployeesModel;

/**
* Employees represents the model behind the search form about `giiant\sakila\models\Employees`.
*/
class Employees extends EmployeesModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['emp_no'], 'integer'],
            [['birth_date', 'first_name', 'last_name', 'gender', 'hire_date'], 'safe'],
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
$query = EmployeesModel::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'emp_no' => $this->emp_no,
            'birth_date' => $this->birth_date,
            'hire_date' => $this->hire_date,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'gender', $this->gender]);

return $dataProvider;
}
}