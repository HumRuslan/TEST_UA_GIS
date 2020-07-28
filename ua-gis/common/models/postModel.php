<?php

    namespace common\models;

    use core\baseModel;

    class postModel extends baseModel
    {
        public $id;
        public $autor_id;
        public $post;
        public $approval;

        static $table = 'post';

        public function rules()
        {
            return [
                'required' => ['autor_id', 'post'],
                'string' => ['post'],
                'integer' => ['autor_id'],
                'boolean' => ['approval'],
            ];
        }
    }