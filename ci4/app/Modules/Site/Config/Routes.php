<?php

use Site\Controllers\SiteController;

   $routes->get('/', [SiteController::class, 'index'], ['as' => 'site.index']);
   
$routes->group('site', static function ($routes) {
    $routes->get('about', [SiteController::class, 'about'], ['as' => 'site.about']);
    $routes->get('blog_home', [SiteController::class, 'blog_home'], ['as' => 'site.blog_home']);
    $routes->get('blog_post', [SiteController::class, 'blog_post'], ['as' => 'site.blog_post']);
    $routes->get('contact',[SiteController::class, 'contact'], ['as' => 'site.contact']);
    $routes->get('faq', [SiteController::class, 'faq'], ['as' => 'site.faq']);
    $routes->get('portfolio_item', [SiteController::class, 'portfolio_item'], ['as' => 'site.portfolio_item']);
    $routes->get('portfolio_overview', [SiteController::class, 'portfolio_overview'], ['as' => 'site.portfolio_overview']);
    $routes->get('pricing', [SiteController::class, 'pricing'], ['as' => 'site.pricing']);  
    
    // Site sub-routes
    $routes->group('site', static function ($routes) {
        // ...
    });
});
