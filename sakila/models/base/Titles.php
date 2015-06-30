<?php

namespace giiant\sakila\models\base;

use Yii;

/**
 * This is the base-model class for table "titles".
 *
 * @property integer $emp_no
 * @property string $title
 * @property string $from_date
 * @property string $to_date
 *
 * @property \giiant\sakila\models\Employees $empNo
 */
class Titles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_no', 'title', 'from_date'], 'required'],
            [['emp_no'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['title'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_no' => Yii::t('app', 'Emp No'),
            'title' => Yii::t('app', 'Title'),
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
