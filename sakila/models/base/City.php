<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "city".
 *
 * @property integer $city_id
 * @property string $city
 * @property integer $country_id
 * @property string $last_update
 *
 * @property \giiant\sakila\models\Address[] $addresses
 * @property \giiant\sakila\models\Country $country
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['last_update'], 'safe'],
            [['city'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => Yii::t('app', 'City ID'),
            'city' => Yii::t('app', 'City'),
            'country_id' => Yii::t('app', 'Country ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(\giiant\sakila\models\Address::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(\giiant\sakila\models\Country::className(), ['country_id' => 'country_id']);
    }
}
