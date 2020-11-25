<?php

trait LoadView
{
    public function view($view, $data=[])
    {
        if(file_exists(APPROOT."/views/".$view.".php"))
        {
            require_once APPROOT."/views/".$view.".php";
        }
        else{
            die("This view does not exist");
        }
    }
}