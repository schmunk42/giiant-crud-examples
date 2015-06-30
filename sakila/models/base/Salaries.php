<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "salaries".
 *
 * @property integer $emp_no
 * @property integer $salary
 * @property string $from_date
 * @property string $to_date
 *
 * @property \giiant\sakila\models\Employees $empNo
 */
class Salaries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salaries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_no', 'salary', 'from_date', 'to_date'], 'required'],
            [['emp_no', 'salary'], 'integer'],
            [['from_date', 'to_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_no' => Yii::t('app', 'Emp No'),
            'salary' => Yii::t('app', 'Salary'),
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
}
