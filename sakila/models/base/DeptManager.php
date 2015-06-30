<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "dept_manager".
 *
 * @property string $dept_no
 * @property integer $emp_no
 * @property string $from_date
 * @property string $to_date
 *
 * @property \giiant\sakila\models\Employees $empNo
 * @property \giiant\sakila\models\Departments $deptNo
 */
class DeptManager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dept_manager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_no', 'emp_no', 'from_date', 'to_date'], 'required'],
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
            'dept_no' => Yii::t('app', 'Dept No'),
            'emp_no' => Yii::t('app', 'Emp No'),
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
