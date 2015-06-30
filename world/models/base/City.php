<?php

namespace giiant\world\models\base;

use Yii;

/**
 * This is the base-model class for table "City".
 *
 * @property integer $ID
 * @property string $Name
 * @property string $CountryCode
 * @property string $District
 * @property integer $Population
 *
 * @property \giiant\world\models\Country $countryCode
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'City';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Population'], 'integer'],
            [['Name'], 'string', 'max' => 35],
            [['CountryCode'], 'string', 'max' => 3],
            [['District'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'Name' => Yii::t('app', 'Name'),
            'CountryCode' => Yii::t('app', 'Country Code'),
            'District' => Yii::t('app', 'District'),
            'Population' => Yii::t('app', 'Population'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryCode()
    {
        return $this->hasOne(\giiant\world\models\Country::className(), ['Code' => 'CountryCode']);
    }
}
