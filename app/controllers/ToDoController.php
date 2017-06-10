<?php
namespace app\controllers;

use app\models\ToDo;
use Pheasant;
use app\controllers\BaseController;

class ToDoController extends BaseController{
    public function index()
    {
        $todos = ToDo::all();
        return $this->render('todo/index', ['todos' => $todos]);
    }

    public function migrate(){

        Pheasant::setup('mysql://root:root@localhost:3306/test');
        $migrator = new \Pheasant\Migrate\Migrator();

        $migrator->initialize(ToDo::schema(), 'todo');
        echo 'migrate  done! <br>';
    }

    public function  test(){

        $todo = new ToDo();
        echo "<pre>";
        var_dump($todo);
        echo "</pre>";
        $todo->title ='test111';
        $todo->status = false;
        $todo->save();

    }
}