<?php

namespace giiant\world\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use giiant\world\models\CountryLanguage as CountryLanguageModel;

/**
* CountryLanguage represents the model behind the search form about `giiant\world\models\CountryLanguage`.
*/
class CountryLanguage extends CountryLanguageModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['CountryCode', 'Language', 'IsOfficial'], 'safe'],
            [['Percentage'], 'number'],
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
$query = CountryLanguageModel::find();

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
            'Percentage' => $this->Percentage,
        ]);

        $query->andFilterWhere(['like', 'CountryCode', $this->CountryCode])
            ->andFilterWhere(['like', 'Language', $this->Language])
            ->andFilterWhere(['like', 'IsOfficial', $this->IsOfficial]);

return $dataProvider;
}
}