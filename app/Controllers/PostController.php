<?php

class PostController extends Controller
{
    public function index()
    {
        $data = [
            'details' => '',
            'title' => ''
        ];
        return $this->view('pages/post/index', $data);
    }
}