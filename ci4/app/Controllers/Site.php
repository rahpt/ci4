<?php

namespace App\Controllers;

class Site extends BaseController {

    function __construct()
    {

    }

    public function index(): void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/index', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function about():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/about', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function blog_home():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/blog-home', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function blog_post():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/blog-post', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function contact():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/contact', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function faq():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/faq', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function portfolio_item():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/portfolio-item', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function portfolio_overview():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/portfolio-overview', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }

    public function pricing():void {
        $data = [];
        echo view(getenv('theme.frontend.path') . 'main/header');
        echo view(getenv('theme.frontend.path') . 'form/pricing', $data);
        echo view(getenv('theme.frontend.path') . 'main/footer');
    }
}
