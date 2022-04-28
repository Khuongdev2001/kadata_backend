<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "auth_item_child".
 *
 * @property string $parent
 * @property string $child
 *
 * @property \app\models\AuthItem $child0
 * @property \app\models\AuthItem $parent0
 * @property string $aliasModel
 */
abstract class AuthItemChild extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64],
            [['parent', 'child'], 'unique', 'targetAttribute' => ['parent', 'child']],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\AuthItem::className(), 'targetAttribute' => ['parent' => 'name']],
            [['child'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\AuthItem::className(), 'targetAttribute' => ['child' => 'name']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => 'Parent',
            'child' => 'Child',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(\app\models\AuthItem::className(), ['name' => 'child']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(\app\models\AuthItem::className(), ['name' => 'parent']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\AuthItemChildQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AuthItemChildQuery(get_called_class());
    }


}