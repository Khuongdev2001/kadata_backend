<?php

namespace app\modules\v1\admin\controllers;

use yii\rest\Controller as BaseController;

class Controller extends BaseController
{
    public function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }

    public function verbs()
    {
        return [
            'login' => ['POST'],
            'index' => ['GET'],
            'update' => ['POST'],
            'view' => ['GET'],
            'delete' => ['POST', 'DELETE'],
            'delete-many' => ['POST', 'DELETE'],
            'create' => ['POST']
        ];
    }
}
