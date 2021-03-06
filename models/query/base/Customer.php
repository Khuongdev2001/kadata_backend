<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\query\base;

use Yii;

/**
 * This is the base-model class for table "customers".
 *
 * @property integer $id
 * @property string $customer_code
 * @property string $surrogate
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property integer $status
 * @property string $created_at
 * @property string $updated
 *
 * @property \app\models\query\Report[] $reports
 * @property \app\models\query\Wage[] $wages
 * @property string $aliasModel
 */
abstract class Customer extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_code'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated'], 'safe'],
            [['customer_code', 'surrogate', 'name', 'phone', 'address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'customer_code' => Yii::t('models', 'Customer Code'),
            'surrogate' => Yii::t('models', 'Surrogate'),
            'name' => Yii::t('models', 'Name'),
            'phone' => Yii::t('models', 'Phone'),
            'address' => Yii::t('models', 'Address'),
            'status' => Yii::t('models', 'Status'),
            'created_at' => Yii::t('models', 'Created At'),
            'updated' => Yii::t('models', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(\app\models\query\Report::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWages()
    {
        return $this->hasMany(\app\models\query\Wage::className(), ['customer_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CustomerQuery(get_called_class());
    }


}
