<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\query\base;

use Yii;

/**
 * This is the base-model class for table "event_results".
 *
 * @property integer $id
 * @property integer $consultant_id
 * @property integer $event_id
 * @property integer $seller_id
 * @property integer $customer_id
 * @property string $buyer_name
 * @property string $buyer_phone
 * @property integer $turnover
 * @property integer $status
 * @property string $paid_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\query\Staff $consultant
 * @property \app\models\query\Customer $customer
 * @property \app\models\query\Event $event
 * @property \app\models\query\Staff $seller
 * @property string $aliasModel
 */
abstract class EventResult extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['consultant_id'], 'required'],
            [['consultant_id', 'event_id', 'seller_id', 'customer_id', 'turnover', 'status'], 'integer'],
            [['paid_at', 'created_at', 'updated_at'], 'safe'],
            [['buyer_name'], 'string', 'max' => 255],
            [['buyer_phone'], 'string', 'max' => 50],
            [['consultant_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\query\Staff::className(), 'targetAttribute' => ['consultant_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\query\Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\query\Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['seller_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\query\Staff::className(), 'targetAttribute' => ['seller_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
//        return [
//            'id' => Yii::t('models', 'ID'),
//            'consultant_id' => Yii::t('models', 'Consultant ID'),
//            'event_id' => Yii::t('models', 'Event ID'),
//            'seller_id' => Yii::t('models', 'Seller ID'),
//            'customer_id' => Yii::t('models', 'Customer ID'),
//            'buyer_name' => Yii::t('models', 'Buyer Name'),
//            'buyer_phone' => Yii::t('models', 'Buyer Phone'),
//            'turnover' => Yii::t('models', 'Turnover'),
//            'status' => Yii::t('models', 'Status'),
//            'paid_at' => Yii::t('models', 'Paid At'),
//            'created_at' => Yii::t('models', 'Created At'),
//            'updated_at' => Yii::t('models', 'Updated At'),
//        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultant()
    {
        return $this->hasOne(\app\models\query\Staff::className(), ['id' => 'consultant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\app\models\query\Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(\app\models\query\Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(\app\models\query\Staff::className(), ['id' => 'seller_id']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\EventResultQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EventResultQuery(get_called_class());
    }


}
