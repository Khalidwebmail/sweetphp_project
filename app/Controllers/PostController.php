<?php

class PostController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['user_id']))
        {
            Redirect::to('usercontroller/login');
        }
        $this->post_model = $this->model('Post');
    }
    private $data = [];

    public function index()
    {
        $posts = $this->post_model->postList();
        $this->data = [
            'posts' =>$posts
        ];
        return $this->view('pages/post/index', $this->data);
    }
}