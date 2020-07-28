<?php

    namespace backend\models;

    use core\baseModel;

    class orderListModel extends baseModel
    {
        public $id;
        public $name;
        public $email;
        public $phone;
        public $approval;
        public $book;
        public $book_autor;

        static $table = 'order_list';

        public function rules()
        {
            return [
                
            ];
        }
    }