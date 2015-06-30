<?php

namespace giiant\world\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use giiant\world\models\Country as CountryModel;

/**
* Country represents the model behind the search form about `giiant\world\models\Country`.
*/
class Country extends CountryModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['Code', 'Name', 'Continent', 'Region', 'LocalName', 'GovernmentForm', 'HeadOfState', 'Code2'], 'safe'],
            [['SurfaceArea', 'LifeExpectancy', 'GNP', 'GNPOld'], 'number'],
            [['IndepYear', 'Population', 'Capital'], 'integer'],
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
$query = CountryModel::find();

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
            'SurfaceArea' => $this->SurfaceArea,
            'IndepYear' => $this->IndepYear,
            'Population' => $this->Population,
            'LifeExpectancy' => $this->LifeExpectancy,
            'GNP' => $this->GNP,
            'GNPOld' => $this->GNPOld,
            'Capital' => $this->Capital,
        ]);

        $query->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Continent', $this->Continent])
            ->andFilterWhere(['like', 'Region', $this->Region])
            ->andFilterWhere(['like', 'LocalName', $this->LocalName])
            ->andFilterWhere(['like', 'GovernmentForm', $this->GovernmentForm])
            ->andFilterWhere(['like', 'HeadOfState', $this->HeadOfState])
            ->andFilterWhere(['like', 'Code2', $this->Code2]);

return $dataProvider;
}
}