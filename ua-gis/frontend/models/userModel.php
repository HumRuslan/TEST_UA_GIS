<?php

    namespace frontend\models;

    use core\baseModel;

    class userModel extends baseModel
    {
        public $id;
        public $email;
        public $password;

        static $table = 'user';

        public function rules()
        {
            return [
                'required' => ['email', 'password'],
                'string' => ['password'],
                'email' => ['email'],
            ];
        }
    }