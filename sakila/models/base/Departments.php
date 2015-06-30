<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "departments".
 *
 * @property string $dept_no
 * @property string $dept_name
 *
 * @property \giiant\sakila\models\DeptEmp[] $deptEmps
 * @property \giiant\sakila\models\Employees[] $empNos
 * @property \giiant\sakila\models\DeptManager[] $deptManagers
 * @property \giiant\sakila\models\Employees[] $empNos0
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_no', 'dept_name'], 'required'],
            [['dept_no'], 'string', 'max' => 4],
            [['dept_name'], 'string', 'max' => 40],
            [['dept_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_no' => Yii::t('app', 'Dept No'),
            'dept_name' => Yii::t('app', 'Dept Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptEmps()
    {
        return $this->hasMany(\giiant\sakila\models\DeptEmp::className(), ['dept_no' => 'dept_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpNos()
    {
        return $this->hasMany(\giiant\sakila\models\Employees::className(), ['emp_no' => 'emp_no'])->viaTable('dept_emp', ['dept_no' => 'dept_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptManagers()
    {
        return $this->hasMany(\giiant\sakila\models\DeptManager::className(), ['dept_no' => 'dept_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpNos0()
    {
        return $this->hasMany(\giiant\sakila\models\Employees::className(), ['emp_no' => 'emp_no'])->viaTable('dept_manager', ['dept_no' => 'dept_no']);
    }
}
