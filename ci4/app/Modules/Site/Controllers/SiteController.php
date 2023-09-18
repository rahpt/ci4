<?php

namespace Site\Controllers;

use App\Controllers\BaseController;

class SiteController extends BaseController {

    public $data = [];

    /**
     * Constructor.
     *
     */
    public function __construct() {
        // ...
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/index', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function about(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/about', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function blog_home(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/blog-home', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function blog_post(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/blog-post', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function contact(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/contact', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function faq(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/faq', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function portfolio_item(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/portfolio-item', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function portfolio_overview(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/portfolio-overview', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

    public function pricing(): void {
        $data = [];
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/header');
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'form/pricing', $data);
        echo view('Site\Views\\'.getenv('theme.frontend.path') . 'main/footer');
    }

}
