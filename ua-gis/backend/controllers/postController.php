<?php

namespace backend\controllers;
use core\baseController;
use common\models\postViewModel;
use common\models\postModel;

class postController extends baseController
{
    public function indexAction()
    {
        $model = postViewModel::find()->all();
        $this->layot = true;
        $this->render('index', [
            'model' => $model,
        ]);
    }

    public function yesApprovalAction()
    {
        $model = postViewModel::find()
            ->where(['approval' => true])
            ->all();
        $this->layot = true;
        $this->render('index', [
            'model' => $model,
        ]);
    }

    public function notApprovalAction()
    {
        $model = postViewModel::find()
            ->where(['approval' => false])
            ->all();
        $this->layot = true;
        $this->render('index', [
            'model' => $model,
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

    public function deleteAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $model = postModel::delete(['id' => $id]);
        }
        $this->redirect('post/index');
    }

    public function approvalAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $post = postModel::find()
                ->where(['id' => $id])
                ->one();
            $model = new postModel;
            foreach ($post as $key => $value){
                $model->{$key} = $value;
            }
            $model->approval = true;
            $model->update(['id' => $id]);
            $this->redirect('post/index');
        }
    }
}