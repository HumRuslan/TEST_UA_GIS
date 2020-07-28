<?php

namespace frontend\controllers;
use core\baseController;
use frontend\models\userModel;

class userController extends baseController
{
    public function createAction()
    {
        $model = new userModel;
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if ($model->loadPost() && $model->validate()){
            $user = userModel::find()
                    ->where(['email' => $model->email])
                    ->one();
            if (!$user){
                $model->password = $this->passwordHasher($model->password);
                if ($id = $model->save()){
                    $_SESSION['isAuth'] = true;
                    $_SESSION['user_id'] = $id;
                    $_SESSION['success'] = 'Пользователь зарегистрирован';
                } else {
                    $_SESSION['error'] = 'Ошибка регистрации пользователя';
                }
            } else {
                $_SESSION['error'] = 'Пользователь с таким email уже зарегистрирован';
            }
        } else {
            $_SESSION['error'] = 'Ошибка регистрации пользователя';
        }
        echo true;
    }

    public function loginAction()
    {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $user = userModel::find()
            ->where([
                'email' => $_POST['email'],
                'password' => $this->passwordHasher($_POST['password'])
            ])
            ->one();
        if ($user){
            $_SESSION['success'] = 'Пользователь авторизирован';
            $_SESSION['isAuth'] = true;
            $_SESSION['user_id'] = $user->id;
        } else {
            $_SESSION['error'] = 'Ошибка авторизации пользователя';
        }
        echo true;        
    }

    public function logOutAction()
    {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        unset($_SESSION['isAuth']);
        unset($_SESSION['user_id']);
        session_destroy();
        echo true;
    }
}
