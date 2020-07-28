<?php
    namespace api;
    use core\baseApi;
    use\common\models\postModel;
    use\common\models\postViewModel;

    class postApi extends baseApi
    {
        public $apiName = 'post';

        public function indexAction()
        {
            $post = postViewModel::find()->all();
            if($post){
                return $this->response($post, 200);
            }
            return $this->response('Data not found', 404);
        }

        public function viewAction()
        {
            $id = array_shift($this->requestUri);
            if($id){
                $post = postViewModel::find()
                ->where(['id' => $id])
                ->one();
                if($post){
                    return $this->response($post, 200);
                }
            }
            return $this->response('Data not found', 404);
        }

        public function createAction()
        {
            $model = new postModel;
            $model->post = $this->requestParams['post'] ?? '';
            $autor_id = $this->requestParams['autor_id'] ?? '';
            if($model->validate()){
                if($model->save()){
                    return $this->response('Data saved.', 200);
                }
            }
            return $this->response("Saving error", 500);
        }

        public function updateAction()
        {

        }

        public function deleteAction()
        {

        }

    }