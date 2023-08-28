<?php
$menus = [];
if(file_exists(APPPATH . "Views/menus/Frontend.json")){
    $menus = file_get_contents(APPPATH . "Views/menus/Frontend.json");
    $menus = @json_decode($menus);
}
?>
<style>
.logo{
    filter: brightness(100);
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="/"><img class="logo mt-2" src="<?=site_url('themes/focus2/images/logo-full.png')?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/"><i class=""></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/site/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/site/contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="/site/pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="/site/faq">FAQ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                        <li><a class="dropdown-item" href="/site/blog_home">Blog Home</a></li>
                        <li><a class="dropdown-item" href="/site/blog_post">Blog Post</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                        <li><a class="dropdown-item" href="/site/portfolio_overview">Portfolio Overview</a></li>
                        <li><a class="dropdown-item" href="/site/portfolio_item">Portfolio Item</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php 
                        if(empty(session()->get('token'))){
                            echo '<a class="btn btn-outline-light" href="/login">LOGIN</a>';
                        }else{
                            echo '<a class="btn btn-outline-light" href="/dashboard">Dashboard</a>';
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>