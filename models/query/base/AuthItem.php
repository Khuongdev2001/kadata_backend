<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\query\base;

use Yii;

/**
 * This is the base-model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property resource $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \app\models\query\AuthAssignment[] $authAssignments
 * @property \app\models\query\AuthItemChild[] $authItemChildren
 * @property \app\models\query\AuthItemChild[] $authItemChildren0
 * @property \app\models\query\AuthItem[] $children
 * @property \app\models\query\AuthItem[] $parents
 * @property \app\models\query\AuthRule $ruleName
 * @property string $aliasModel
 */
abstract class AuthItem extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\query\AuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('models', 'Name'),
            'type' => Yii::t('models', 'Type'),
            'description' => Yii::t('models', 'Description'),
            'rule_name' => Yii::t('models', 'Rule Name'),
            'data' => Yii::t('models', 'Data'),
            'created_at' => Yii::t('models', 'Created At'),
            'updated_at' => Yii::t('models', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(\app\models\query\AuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(\app\models\query\AuthItemChild::className(), ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren0()
    {
        return $this->hasMany(\app\models\query\AuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(\app\models\query\AuthItem::className(), ['name' => 'child'])->viaTable('auth_item_child', ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(\app\models\query\AuthItem::className(), ['name' => 'parent'])->viaTable('auth_item_child', ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(\app\models\query\AuthRule::className(), ['name' => 'rule_name']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\AuthItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AuthItemQuery(get_called_class());
    }


}
