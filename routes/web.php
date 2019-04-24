<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/aste', function () {
	// return "我第一次修改laravel";
    return view('index', ['name' => 'Laravel零基础入门','title' => 'wo shi biao ti','records' => '99']);
    return view('greetings', ['name' => '学院君']);
    return view('welcome');
});

Route::get('/tom', function () {

    return "我第一次修改laravel";
});


Route::get('index/index', 'IndexController@index');



Route::get('/bbs', function () {
    return "欢迎访问bbs论坛";
});

Route::get('/welcome', function () {
	// return "我第一次修改laravel";
    return view('welcome');
});

Route::get('/bootstrap', function () {
	// return "我第一次修改laravel";
    return view('bootstrap');
});

Route::get('/a', function () {
	return view('index', ['name' => 'Laravel零基础入门']);
    return view('greeting', ['name' => 'laravel零基础入门']);
});


Route::get('user/show/{id}/{name}', 'UserController@show');

// 详情页
Route::get('view/{id}', 'UserController@view');


Route::get('v/{id}', 'UserController@v');

// 首页
Route::any('/', 'UserController@show');

// 编辑留言
Route::any('/edit/{id}', 'UserController@edit');

// test
Route::any('/test', 'UserController@test3');

Route::get('user/{id}/{name}', 'UserController@list');
// Route::get('user{id}{name}', 'UserController@list');

// 没找到的页面
Route::get('{id}', function () {
    // return "我第一次修改laravel";
    return "404 页面没找到！~";
});

// 没找到的页面
Route::get('{id}/{it}', function () {
    // return "我第一次修改laravel";
    return "404 页面没找到333！~";
});
// Route::get('{id}', 'UserController@show');