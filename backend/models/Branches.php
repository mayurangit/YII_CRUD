<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $branch_id
 * @property string $branch_name
 * @property string $branch_location
 *
 * @property Employees[] $employees
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_name', 'branch_location'], 'required'],
            [['branch_name', 'branch_location'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'branch_name' => 'Branch Name',
            'branch_location' => 'Branch Location',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['branches_branch_id' => 'branch_id']);
    }
}
