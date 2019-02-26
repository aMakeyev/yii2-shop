<?php

namespace backend\models;


use yii\db\ActiveRecord;


class Auth_assignment extends ActiveRecord
{

    public static function tableName()
    {
        return 'auth_assignment';
    }

    /*public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }*/


}
