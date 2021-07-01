<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $employee_id
 * @property string $employee_name
 * @property string $employee_position
 * @property int $branches_branch_id
 *
 * @property Branches $branchesBranch
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['employee_name', 'employee_position', 'branches_branch_id'], 'required'],
                [['employee_name'], 'string', 'max' => 100],
                [['employee_position'], 'string', 'max' => 50],
                [['branches_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branches_branch_id' => 'branch_id'],
                [['branches_branch_id'], 'safe'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'employee_name' => 'Employee Name',
            'employee_position' => 'Employee Position',
            'branches_branch_id' => 'Branches Branch ID',
            'BranchesBranch.branch_name' => 'Branch Name',
        ];
    }

    /**
     * Gets query for [[BranchesBranch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranchesBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'branches_branch_id']);
    }
}
