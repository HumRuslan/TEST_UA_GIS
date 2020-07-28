<?php

    namespace common\models;

    use core\baseModel;

    class postViewModel extends baseModel
    {
        public $id;
        public $autor;
        public $post;
        public $approval;

        static $table = 'post_view';

        public function rules()
        {
            return [
                
            ];
        }
    }