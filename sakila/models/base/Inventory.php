<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "inventory".
 *
 * @property integer $inventory_id
 * @property integer $film_id
 * @property integer $store_id
 * @property string $last_update
 *
 * @property \giiant\sakila\models\Film $film
 * @property \giiant\sakila\models\Store $store
 * @property \giiant\sakila\models\Rental[] $rentals
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'store_id'], 'required'],
            [['film_id', 'store_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inventory_id' => Yii::t('app', 'Inventory ID'),
            'film_id' => Yii::t('app', 'Film ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(\giiant\sakila\models\Film::className(), ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(\giiant\sakila\models\Store::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(\giiant\sakila\models\Rental::className(), ['inventory_id' => 'inventory_id']);
    }
}
