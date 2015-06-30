<?php

namespace giiant\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use giiant\sakila\models\DeptManager as DeptManagerModel;

/**
* DeptManager represents the model behind the search form about `giiant\sakila\models\DeptManager`.
*/
class DeptManager extends DeptManagerModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['dept_no', 'from_date', 'to_date'], 'safe'],
            [['emp_no'], 'integer'],
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
$query = DeptManagerModel::find();

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
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
        ]);

        $query->andFilterWhere(['like', 'dept_no', $this->dept_no]);

return $dataProvider;
}
}