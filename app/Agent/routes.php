<?php
use Illuminate\Routing\Router;

Route::get('/', 'HomeController@index');

Route::group([
    'as'         => 'agent.',
], function (Router $router) {
    $router->resource('stores', StoreController::class);
});
