<?php
// class Controller{
//     public function view($view,$data=[])
//     {
//         require_once '../app/views/'.$view.'.php';
//     }

// }// core/Controller.php
class Controller {
    public function view($view, $data = [], $returnAsString = false) {
        extract($data);
        if ($returnAsString) {
            ob_start();
            require "app/views/$view.php";
            $output = ob_get_clean();
            return $output.$url;
        } else {
            require "app/views/$view.php";
        }
    }
    //   public function view($view,$data=[])
    // {
      
    //     require_once 'app/views/'.$view.'.php';
    // }

    public function model($model)
    {
        require_once 'app/models/'.$model.'.php';
        return new $model;
    }
}


