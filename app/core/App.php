<?php

class App {

    protected $controller = 'Auth';
    protected $method = 'index';
    protected $parameter = [];

    public function __construct(){
        $url = $this->parseURL();

        //controller
        if(isset($url[0])){
            $class = ucfirst($url[0]);
            if(file_exists('../app/controllers/'.$class. '.php')){
                $this->controller = $class;
                unset($url[0]);
            }
        }
        
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        //method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //parameter
        if(!empty($url)){
            $this->parameter = array_values($url);
        }

        //run contoller and method
        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}