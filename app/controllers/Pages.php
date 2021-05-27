<?php

class Pages extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $data = 
        [
            'title' => 'YourClass',
            'description' => 'The best website to organize the classes in your center',
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data =
        [
            'title' => 'About Us',
            'description' => 'YourClass is a website founded in 2021 at YouCode to orgonize classes in centers',
        ];

        $this->view('pages/about', $data);
    }
}