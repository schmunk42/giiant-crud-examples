<?php

namespace giiant\world\models\base;

use Yii;

/**
 * This is the base-model class for table "CountryLanguage".
 *
 * @property string $CountryCode
 * @property string $Language
 * @property string $IsOfficial
 * @property double $Percentage
 *
 * @property \giiant\world\models\Country $countryCode
 */
class CountryLanguage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CountryLanguage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CountryCode', 'Language'], 'required'],
            [['IsOfficial'], 'string'],
            [['Percentage'], 'number'],
            [['CountryCode'], 'string', 'max' => 3],
            [['Language'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CountryCode' => Yii::t('app', 'Country Code'),
            'Language' => Yii::t('app', 'Language'),
            'IsOfficial' => Yii::t('app', 'Is Official'),
            'Percentage' => Yii::t('app', 'Percentage'),
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
