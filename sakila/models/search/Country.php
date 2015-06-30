<?php

namespace giiant\sakila\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use giiant\sakila\models\Country as CountryModel;

/**
* Country represents the model behind the search form about `giiant\sakila\models\Country`.
*/
class Country extends CountryModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['country_id'], 'integer'],
            [['country', 'last_update'], 'safe'],
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
            'country_id' => $this->country_id,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'country', $this->country]);

return $dataProvider;
}
}