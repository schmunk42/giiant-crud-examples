<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "film_category".
 *
 * @property integer $film_id
 * @property integer $category_id
 * @property string $last_update
 *
 * @property \giiant\sakila\models\Category $category
 * @property \giiant\sakila\models\Film $film
 */
class FilmCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'category_id'], 'required'],
            [['film_id', 'category_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'film_id' => Yii::t('app', 'Film ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\giiant\sakila\models\Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(\giiant\sakila\models\Film::className(), ['film_id' => 'film_id']);
    }
}
