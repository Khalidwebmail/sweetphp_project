<?php

trait LoadModel
{
    public function model($model)
    {
        if(file_exists("../app/Models/".$model.".php"))
        {
            require_once "../app/Models/".$model.".php";
            return new $model();
        }
    }
}