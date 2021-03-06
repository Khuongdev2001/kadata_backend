<?php

namespace app\models\query;

use Yii;
use \app\models\query\base\AuthItemChild as BaseAuthItemChild;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "auth_item_child".
 */
class AuthItemChild extends BaseAuthItemChild
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
