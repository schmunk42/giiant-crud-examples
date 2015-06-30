<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "store".
 *
 * @property integer $store_id
 * @property integer $manager_staff_id
 * @property integer $address_id
 * @property string $last_update
 *
 * @property \giiant\sakila\models\Customer[] $customers
 * @property \giiant\sakila\models\Inventory[] $inventories
 * @property \giiant\sakila\models\Staff[] $staff
 * @property \giiant\sakila\models\Address $address
 * @property \giiant\sakila\models\Staff $managerStaff
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manager_staff_id', 'address_id'], 'required'],
            [['manager_staff_id', 'address_id'], 'integer'],
            [['last_update'], 'safe'],
            [['manager_staff_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => Yii::t('app', 'Store ID'),
            'manager_staff_id' => Yii::t('app', 'Manager Staff ID'),
            'address_id' => Yii::t('app', 'Address ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(\giiant\sakila\models\Customer::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(\giiant\sakila\models\Inventory::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(\giiant\sakila\models\Staff::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(\giiant\sakila\models\Address::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagerStaff()
    {
        return $this->hasOne(\giiant\sakila\models\Staff::className(), ['staff_id' => 'manager_staff_id']);
    }
}
