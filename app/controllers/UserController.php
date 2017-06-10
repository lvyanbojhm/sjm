<?php
namespace app\controllers;

class UserController{
    
    public function showDetails(){
        echo 'id->'.$_GET['user'];
    }

    public function listAll(){
        echo '1232';
    }
}