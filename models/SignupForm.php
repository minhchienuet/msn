<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class SignupForm extends Model
{
    public $email;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' =>'This email has already exist'],
            ['email','string','min'=>2, 'max'=>50],
            // password is validated by validatePassword()
            ['password', 'required'],
            ['password', 'string', 'min'=>6],
        ];
    }
    public function signup()
    {
        if($this->validate()){
            $user = new User();
            $user->email = $this->email;
            $user->password = $this->password;
           // $user->generateAuthKey();
            $user->save();
            return $user;
        }
        return null;
    }
}
