<?php

class UserController extends Controller
{
    public function __construct()
    {
        
    }
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            //Process form
        }
        else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' =>'',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' =>'',
            ];

            return $this->view('pages/user/register', $data);
        }
    }

    public function login()
    {
        
    }
}