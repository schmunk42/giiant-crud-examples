<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "film_actor".
 *
 * @property integer $actor_id
 * @property integer $film_id
 * @property string $last_update
 *
 * @property \giiant\sakila\models\Actor $actor
 * @property \giiant\sakila\models\Film $film
 */
class FilmActor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_actor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actor_id', 'film_id'], 'required'],
            [['actor_id', 'film_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => Yii::t('app', 'Actor ID'),
            'film_id' => Yii::t('app', 'Film ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(\giiant\sakila\models\Actor::className(), ['actor_id' => 'actor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(\giiant\sakila\models\Film::className(), ['film_id' => 'film_id']);
    }
}
