<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'PageController@welcome');
$router->get('/posts/', 'PageController@posts');
$router->get('/posts/{slug}', 'PageController@post');
//page bellow
//add .xml
$router->get('/sitemap.xml', 'PageController@sitemap');

//robots.txt в public
//llms.txt в public

//login
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->post('/logout', 'AuthController@logout');

//admin
$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'AdminController@index');

    //posts
    $router->get('/posts', 'Admin\PostController@index');
    $router->get('/posts/create', 'Admin\PostController@create');
    $router->post('/posts', 'Admin\PostController@store');
    $router->get('/posts/{id}/edit', 'Admin\PostController@edit');
    $router->put('/posts/{id}/update', 'Admin\PostController@update');
    $router->post('/posts/{id}/delete', 'Admin\PostController@destroy');

    //pages
    $router->get('/pages', 'Admin\PageController@index');
    $router->get('/pages/create', 'Admin\PageController@create');
    $router->post('/pages', 'Admin\PageController@store');
    $router->get('/pages/{id}/edit', 'Admin\PageController@edit');
    $router->put('/pages/{id}/update', 'Admin\PageController@update');
    $router->post('/pages/{id}/delete', 'Admin\PageController@destroy');

    //images
    $router->get('/images', 'Admin\ImageController@index');
    $router->post('/images', 'Admin\ImageController@store');
    $router->post('/images/{id}/delete', 'Admin\ImageController@destroy');
});

//api
$router->group(['prefix' => 'api', 'middleware' => 'api.token'], function () use ($router) {
    $router->get('/get/posts', 'ApiController@posts');

    $router->post('/posts/add', 'ApiController@addPost');

    //(интегрировать апи токен)
    //todo - приемка постов от контент-генератора

    //todo - приемка реф ссылок
});

$router->get('/{slug}', 'PageController@page');