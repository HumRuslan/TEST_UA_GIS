<?php

namespace frontend\controllers;
use core\baseController;
use common\models\postViewModel;
use common\models\postModel;

class postController extends baseController
{
    public function indexAction()
    {
        $model = postViewModel::find()
            ->where(['approval' => true])
            ->limit(['start' => 0,
                    'step' => 5])
            ->all();
        $count = postViewModel::count(['approval' => true]);
        $page = ceil($count/5);
        $this->layot = true;
        $this->render('index', [
            'model' => $model,
            'page' => $page,
            'page_active' => 1
        ]);
    }

    public function itemAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $model = postViewModel::find()
                ->where(['id' => $id])
                ->one();
            $this->layot = true;
            $this->render('item', ['model' => $model]);
        }
    }

    public function createAction()
    {
        $model = new postModel;
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        $model->date = date("y-m-d");
        $model->autor_id = $_SESSION['user_id'];
        if ($model->loadPost() && $model->validate()){
            if ($model->save()){
                $_SESSION['success'] = 'Пост добавлен. Пост будет отображен после модерации';
                $this->redirect('post/index');
            } else {
                $_SESSION['error'] = 'Ошибка добавления поста';
            }
        }
        $this->layot = true;
        $this->render('create', ['model' => $model]);
    }

    public function paginationAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $page = $_GET['page'];
            $count = postViewModel::count(['approval' => true]);
            $page_all = ceil($count/5);
            if ($page == 0){
                $page = $page_all;
            }
            if ($page > $page_all){
                $page = 1;
            }
            $start = ($page-1) * 5;
            $model = postViewModel::find()
            ->where(['approval' => true])
            ->limit(['start' => $start,
                    'step' => 5])
            ->all();
            $this->layot = true;
            $this->render('index', [
                'model' => $model,
                'page' => $page_all,
                'page_active' => $page
            ]);
        }
    }
}
