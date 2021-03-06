<?php

namespace app\modules\v1\admin\models\form;

use app\modules\v1\admin\models\CustomerEvent;
use yii\behaviors\TimestampBehavior;

class CustomerEventForm extends CustomerEvent
{

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date("Y-m-d h:i:s"),
            ],
        ];
    }

}