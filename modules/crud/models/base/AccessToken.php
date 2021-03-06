<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\modules\crud\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "access_token".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $consumer
 * @property string $token
 * @property string $access_given
 * @property integer $used_at
 * @property integer $expire_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $aliasModel
 */
abstract class AccessToken extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_token';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'used_at', 'expire_at'], 'integer'],
            [['token'], 'required'],
            [['access_given'], 'string'],
            [['consumer'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 32],
            [['token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'user_id' => Yii::t('models', 'User ID'),
            'consumer' => Yii::t('models', 'Consumer'),
            'token' => Yii::t('models', 'Token'),
            'access_given' => Yii::t('models', 'Access Given'),
            'used_at' => Yii::t('models', 'Used At'),
            'expire_at' => Yii::t('models', 'Expire At'),
            'created_at' => Yii::t('models', 'Created At'),
            'updated_at' => Yii::t('models', 'Updated At'),
        ];
    }


    
    /**
     * @inheritdoc
     * @return \app\models\query\AccessTokenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AccessTokenQuery(get_called_class());
    }


}
