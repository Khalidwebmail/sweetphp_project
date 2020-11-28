<?php
class PostController extends Controller
{
    private $data = [
        'title' => '',
        'body' => '',
        'title_err' => '',
        'body_err' => ''
    ];

    public function __construct()
    {
        if(!isset($_SESSION['user_id']))
        {
            Redirect::to('usercontroller/login');
        }
        $this->post_model = $this->model('Post');
    }
    
    public function index()
    {
        $posts = $this->post_model->postList();
        $this->data = [
            'posts' =>$posts
        ];
        return $this->view('pages/post/index', $this->data);
    }

    public function create()
    {
        return $this->view('pages/post/create', $this->data);
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->data = [
                'title' => $this->filter($_POST['title']),
                'body' => $this->filter($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => '',
            ];
            $this->validate();

            if(empty($this->data['title_err']) && empty($this->data['body_err']))
            {
                $this->post_model->savePost($this->data);
                //Flash
                Redirect::to('postcontroller/index');

            } else {
                // Load view with errors
                $this->view('pages/post/create', $this->data);
            }

        }
    }

    public function show($id)
    {
        $post = $this->post_model->showPostById($id);
        $this->data = [
            'post' =>$post
        ];
        return $this->view('pages/post/show', $this->data);
    }

    public function update($id)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
            $this->post_model->updatePost($this->data);
            Redirect::to('postcontroller/index');
        }
    }

    public function delete($id)
    {
        $post = $this->post_model->getPostById($id);
        // dd($post);
        if($post[0]->user_id != $_SESSION['user_id'])
        {
            Redirect::to("postcontroller");
        }
        else{
            $this->post_model->deletePost($id);
        }
        Redirect::to("postcontroller/index");
    }
    private function validate()
    {
        // Validate Email
        if(empty($this->data['title'])){
            $this->data['title_err'] = 'Please enter title';
        }

        // Validate Name
        if(empty($this->data['body'])){
            $this->data['body_err'] = 'Please enter details';
        }
    }
}