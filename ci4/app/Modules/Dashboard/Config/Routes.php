<?php

use Dashboard\Controllers\DashboardController;

$routes->group('',  static function ($routes) {
    $routes->get('dashboards', [DashboardController::class, 'index'], ['as' => 'dashboard.index']);
    $routes->get('dashboard', fn () => redirect()->to(route_to('dashboard.index')));
    $routes->get('dashboard/(:any)', [DashboardController::class, 'show'], ['as' => 'dashboard.show']);
    $routes->post('dashboard', [DashboardController::class, 'store'], ['as' => 'dashboard.store']);
    // $routes->get('dashboard/(:num)/edit', [DashboardController::class, 'edit'], ['as' => 'dashboard.edit']);
    $routes->post('dashboard/(:num)/update', [DashboardController::class, 'update'], ['as' => 'dashboard.update']);
    $routes->delete('dashboard/(:num)', [DashboardController::class, 'delete'], ['as' => 'dashboard.delete']);

    // Dashboard sub-routes
    $routes->group('dashboard', static function ($routes) {
        // ...
    });
});
