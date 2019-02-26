<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    /*public function getAuth_assignment(){
    	return $this->hasMany(Auth_assignment::className(), ['user_id' => 'id']);
	}*/

    /**
     * {@inheritdoc}
     */

	public function behaviors() {
		return [
			[
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
				],
				// если вместо метки времени UNIX используется datetime:
				//'value' => new Expression('NOW()'),
			]
		];
	}

    public function rules()
    {
        return [
            [['username', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
			[['email'], 'email'],
            [['username', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            //[['item_name'], 'string', 'max' => 32],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'status' => 'Статус',
            'created_at' => 'Дата регистрации',
            'updated_at' => 'Дата обновления',

        ];
    }
}
