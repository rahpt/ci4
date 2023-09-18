<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Site::index');

$routes->group('site', static function ($routes) {
    $routes->get('about', 'Site::about');
    $routes->get('blog_home', 'Site::blog_home');
    $routes->get('blog_post', 'Site::blog_post');
    $routes->get('contact', 'Site::contact');
    $routes->get('faq', 'Site::faq');
    $routes->get('portfolio_item', 'Site::portfolio_item');
    $routes->get('portfolio_overview', 'Site::portfolio_overview');
    $routes->get('pricing', 'Site::pricing');
});

$routes->get('/dashboard', 'Dashboard::index');

service('auth')->routes($routes);
