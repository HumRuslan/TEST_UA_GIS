<?php

    namespace backend\models;

    use core\baseModel;

    class commentListModel extends baseModel
    {
        public $id;
        public $autor;
        public $comment;
        public $approval;
        public $book;
        public $book_autor;

        static $table = 'comment_list';

        public function rules()
        {
            return [
                
            ];
        }
    }