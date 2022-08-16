<?php

// Reminder: Pages is the default Controller and Index is the default Method (check libraries/Core.php)
class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => 'Share Posts',
            'description' => 'Simple social network built on the Traversy MVC PHP framework',
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users',
        ];

        $this->view('pages/about', $data);
    }
}
