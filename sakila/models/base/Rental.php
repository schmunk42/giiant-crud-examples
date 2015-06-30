<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "rental".
 *
 * @property integer $rental_id
 * @property string $rental_date
 * @property integer $inventory_id
 * @property integer $customer_id
 * @property string $return_date
 * @property integer $staff_id
 * @property string $last_update
 *
 * @property \giiant\sakila\models\Payment[] $payments
 * @property \giiant\sakila\models\Customer $customer
 * @property \giiant\sakila\models\Inventory $inventory
 * @property \giiant\sakila\models\Staff $staff
 */
class Rental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rental_date', 'inventory_id', 'customer_id', 'staff_id'], 'required'],
            [['rental_date', 'return_date', 'last_update'], 'safe'],
            [['inventory_id', 'customer_id', 'staff_id'], 'integer'],
            [['rental_date', 'inventory_id', 'customer_id'], 'unique', 'targetAttribute' => ['rental_date', 'inventory_id', 'customer_id'], 'message' => 'The combination of Rental Date, Inventory ID and Customer ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rental_id' => Yii::t('app', 'Rental ID'),
            'rental_date' => Yii::t('app', 'Rental Date'),
            'inventory_id' => Yii::t('app', 'Inventory ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'return_date' => Yii::t('app', 'Return Date'),
            'staff_id' => Yii::t('app', 'Staff ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(\giiant\sakila\models\Payment::className(), ['rental_id' => 'rental_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\giiant\sakila\models\Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventory()
    {
        return $this->hasOne(\giiant\sakila\models\Inventory::className(), ['inventory_id' => 'inventory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(\giiant\sakila\models\Staff::className(), ['staff_id' => 'staff_id']);
    }
}
