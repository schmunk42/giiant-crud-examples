<?php

namespace giiant\world\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use giiant\world\models\City as CityModel;

/**
* City represents the model behind the search form about `giiant\world\models\City`.
*/
class City extends CityModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['ID', 'Population'], 'integer'],
            [['Name', 'CountryCode', 'District'], 'safe'],
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
$query = CityModel::find();

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
            'ID' => $this->ID,
            'Population' => $this->Population,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'CountryCode', $this->CountryCode])
            ->andFilterWhere(['like', 'District', $this->District]);

return $dataProvider;
}
}