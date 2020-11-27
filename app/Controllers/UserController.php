<?php

class UserController extends Controller
{
    private $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' =>'',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' =>'',
    ];
    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->data = [
                'name' => $this->filter($_POST['name']),
                'email' => $this->filter($_POST['email']),
                'password' => $this->filter($_POST['password']),
                'confirm_password' =>$this->filter($_POST['confirm_password']),

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' =>'',
            ];

            
            $this->validate();
            // Make sure errors are empty
            if(empty($this->data['email_err']) && empty($this->data['name_err']) && empty($this->data['password_err']) && empty($this->data['confirm_password_err']))
            {
                
                $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

                $this->user->signup($this->data);
                Redirect::to('usercontroller/login');

            } else {
                // Load view with errors
                $this->view('pages/user/register', $this->data);
            }            
        }

        else{
            return $this->view('pages/user/register', $this->data);
        }
    }
    
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->data = [
                'email' => $this->filter($_POST['email']),
                'password' => $this->filter($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            
            $this->validateLogin();
            // Make sure errors are empty
            if(empty($this->data['email_err']) && empty($this->data['password_err']))
            {
                
                $loggedin = $this->user->signin($this->data['email'], $this->data['password']);
                if($loggedin)
                {
                    $this->createUserSession($loggedin);
                }
                else{
                    $this->data['password_err'] = 'Incorrect password';
                    $this->view('pages/user/login', $this->data);
                }

            } else {
                // Load view with errors
                $this->view('pages/user/login', $this->data);
            }            
        }

        else{
            return $this->view('pages/user/login', $this->data);
        }
    }

    private function validate()
    {
        //Check email already exists or not
        if($this->user->findUserByEmail($this->data['email']))
        {
            $this->data['email_err'] = 'Email is already taken';
        }

        // Validate Email
        if(empty($this->data['email'])){
            $this->data['email_err'] = 'Please enter email';
        }

        // Validate Name
        if(empty($this->data['name'])){
            $this->data['name_err'] = 'Please enter name';
        }

        // Validate Password
        if(empty($this->data['password'])){
            $this->data['password_err'] = 'Pleae enter password';
        } elseif(strlen($this->data['password']) < 6){
            $this->data['password_err'] = 'Password must be at least 6 characters';
        }

         // Validate Confirm Password
        if(empty($this->data['confirm_password'])){
            $this->data['confirm_password_err'] = 'Please confirm password';
        } else {
            if($this->data['password'] != $this->data['confirm_password']){
            $this->data['confirm_password_err'] = 'Passwords do not match';
            }
        }
    }

    private function validateLogin()
    {
        if(!$this->user->findUserByEmail($this->data['email']))
        {
            $this->data['email_err'] = 'Email address not fount';
        }

        // Validate Email
        if(empty($this->data['email'])){
            $this->data['email_err'] = 'Please enter email';
        }

        // Validate Password
        if(empty($this->data['password'])){
            $this->data['password_err'] = 'Pleae enter password';
        } elseif(strlen($this->data['password']) < 6){
            $this->data['password_err'] = 'Password must be at least 6 characters';
        }
    }

    private function createUserSession($user)
    {
        $_SESSION['user_id'] = $user[0]['id'];
        $_SESSION['user_name'] = $user[0]['name'];
        $_SESSION['user_email'] = $user[0]['email'];
        Redirect::to('postcontroller/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        Redirect::to('usercontroller/login');
    }

    public function isLoggedIn()
    {
        if(isset($_SESSION['user_id']))
            return true;
        return false;
    }
}