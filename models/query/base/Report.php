<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\query\base;

use Yii;

/**
 * This is the base-model class for table "reports".
 *
 * @property integer $id
 * @property string $report_title
 * @property string $report_content
 * @property integer $customer_id
 * @property integer $status
 * @property string $created_at
 * @property string $done_at
 * @property string $updated_at
 *
 * @property \app\models\query\Customer $customer
 * @property string $aliasModel
 */
abstract class Report extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_content'], 'string'],
            [['customer_id', 'status'], 'integer'],
            [['created_at', 'done_at', 'updated_at'], 'safe'],
            [['report_title'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\query\Customer::className(), 'targetAttribute' => ['customer_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'report_title' => Yii::t('models', 'Report Title'),
            'report_content' => Yii::t('models', 'Report Content'),
            'customer_id' => Yii::t('models', 'Customer ID'),
            'status' => Yii::t('models', 'Status'),
            'created_at' => Yii::t('models', 'Created At'),
            'done_at' => Yii::t('models', 'Done At'),
            'updated_at' => Yii::t('models', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\app\models\query\Customer::className(), ['id' => 'customer_id']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\ReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ReportQuery(get_called_class());
    }


}
