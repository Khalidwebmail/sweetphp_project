<?php

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SharePost',
            'details' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, asperiores excepturi. Dolores quasi amet vero id voluptatem. Minus a corporis laboriosam accusamus sed hic facere molestiae deserunt. At, eligendi quaerat!'
        ];
        return $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About us',
            'details' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, asperiores excepturi. Dolores quasi amet vero id voluptatem. Minus a corporis laboriosam accusamus sed hic facere molestiae deserunt. At, eligendi quaerat!'
        ];
        return $this->view('pages/about', $data);
    }
}