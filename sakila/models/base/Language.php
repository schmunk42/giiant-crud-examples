<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "language".
 *
 * @property integer $language_id
 * @property string $name
 * @property string $last_update
 *
 * @property \giiant\sakila\models\Film[] $films
 * @property \giiant\sakila\models\Film[] $films0
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Yii::t('app', 'Language ID'),
            'name' => Yii::t('app', 'Name'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(\giiant\sakila\models\Film::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms0()
    {
        return $this->hasMany(\giiant\sakila\models\Film::className(), ['original_language_id' => 'language_id']);
    }
}
