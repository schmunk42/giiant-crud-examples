<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "dept_emp".
 *
 * @property integer $emp_no
 * @property string $dept_no
 * @property string $from_date
 * @property string $to_date
 *
 * @property \giiant\sakila\models\Employees $empNo
 * @property \giiant\sakila\models\Departments $deptNo
 */
class DeptEmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dept_emp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_no', 'dept_no', 'from_date', 'to_date'], 'required'],
            [['emp_no'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['dept_no'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_no' => Yii::t('app', 'Emp No'),
            'dept_no' => Yii::t('app', 'Dept No'),
            'from_date' => Yii::t('app', 'From Date'),
            'to_date' => Yii::t('app', 'To Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpNo()
    {
        return $this->hasOne(\giiant\sakila\models\Employees::className(), ['emp_no' => 'emp_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeptNo()
    {
        return $this->hasOne(\giiant\sakila\models\Departments::className(), ['dept_no' => 'dept_no']);
    }
}
