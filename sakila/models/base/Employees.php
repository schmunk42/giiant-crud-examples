<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "employees".
 *
 * @property integer $emp_no
 * @property string $birth_date
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $hire_date
 *
 * @property \giiant\sakila\models\DeptEmp[] $deptEmps
 * @property \giiant\sakila\models\Departments[] $deptNos
 * @property \giiant\sakila\models\DeptManager[] $deptManagers
 * @property \giiant\sakila\models\Departments[] $deptNos0
 * @property \giiant\sakila\models\Salaries[] $salaries
 * @property \giiant\sakila\models\Titles[] $titles
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_no', 'birth_date', 'first_name', 'last_name', 'gender', 'hire_date'], 'required'],
            [['emp_no'], 'integer'],
            [['birth_date', 'hire_date'], 'safe'],
            [['gender'], 'string'],
            [['first_name'], 'string', 'max' => 14],
            [['last_name'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_no' => Yii::t('app', 'Emp No'),
            'birth_date' => Yii::t('app', 'Birth Date'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'gender' => Yii::t('app', 'Gender'),
            'hire_date' => Yii::t('app', 'Hire Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptEmps()
    {
        return $this->hasMany(\giiant\sakila\models\DeptEmp::className(), ['emp_no' => 'emp_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptNos()
    {
        return $this->hasMany(\giiant\sakila\models\Departments::className(), ['dept_no' => 'dept_no'])->viaTable('dept_emp', ['emp_no' => 'emp_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptManagers()
    {
        return $this->hasMany(\giiant\sakila\models\DeptManager::className(), ['emp_no' => 'emp_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptNos0()
    {
        return $this->hasMany(\giiant\sakila\models\Departments::className(), ['dept_no' => 'dept_no'])->viaTable('dept_manager', ['emp_no' => 'emp_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(\giiant\sakila\models\Salaries::className(), ['emp_no' => 'emp_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitles()
    {
        return $this->hasMany(\giiant\sakila\models\Titles::className(), ['emp_no' => 'emp_no']);
    }
}
