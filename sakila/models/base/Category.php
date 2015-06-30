<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "category".
 *
 * @property integer $category_id
 * @property string $name
 * @property string $last_update
 *
 * @property \giiant\sakila\models\FilmCategory[] $filmCategories
 * @property \giiant\sakila\models\Film[] $films
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmCategories()
    {
        return $this->hasMany(\giiant\sakila\models\FilmCategory::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(\giiant\sakila\models\Film::className(), ['film_id' => 'film_id'])->viaTable('film_category', ['category_id' => 'category_id']);
    }
}
