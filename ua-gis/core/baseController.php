<?php

    namespace core;
    use config\config;

    class baseController extends Config
    {
        protected $layot;

        public function render ($view, array $params = [])
        {
            $className = str_replace('Controller', '', substr(get_class($this), strrpos(get_class($this), "\\")+1));
            $path = substr(get_class($this), 0, strpos(get_class($this), "\\"));
            $path = dirname(__DIR__) . '/' . $path;
            if ($this->layot){
                require_once $path . '/views/__shared/header.php';
            }
            $viewPath = $path . '/views/' . $className . '/' . $view . '.php';
            if (file_exists($viewPath)){
                extract ($params);
                require_once $viewPath;
            } else {
                extract(['error' => "View file not found file name: $viewPath"]);
                require_once ($path . '/views/__shared/error.php');
            }
            if ($this->layot){
                require_once ($path . '/views/__shared/footer.php');
            }
        }

        public function redirect($path)
        {
            Header("Location: /$path");
        }

        public function passwordHasher($password){
            return sha1(self::salt . $password . self::salt);
        }
    }