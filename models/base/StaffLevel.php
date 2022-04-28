<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "staff_levels".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pay_level
 * @property integer $allowance_pay
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Staff[] $staff
 * @property string $aliasModel
 */
abstract class StaffLevel extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETE = -99;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_levels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['pay_level', 'allowance_pay', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pay_level' => 'Pay Level',
            'allowance_pay' => 'Allowance Pay',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(\app\models\Staff::className(), ['staff_level' => 'id']);
    }



    /**
     * @inheritdoc
     * @return \app\models\StaffLevelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StaffLevelQuery(get_called_class());
    }
}