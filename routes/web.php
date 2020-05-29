<?php

//_____________路由演示
Route::get('foo', function () {
    return 'Hello World';
});

Route::get('/user', 'UserController@index');

Route::match(['get', 'post'], '/', function () {
    //向应多种方法
});

Route::any('/', function () {
    //any 方法注册一个实现响应所有 HTTP 请求的路由
});

//重定向(第三个参数返回状态码)
Route::redirect('/here', '/there', 301);
//视图路由
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
//带参数路由
Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});
//___
//异常
Route::get('isValid','ErrorController@isValid');
//Route::get('example','ErrorController@example');
Route::get('/example', function () {
    throw new \App\Exceptions\InvalidRequestException('我是一个异常啦',$code=406);
});
Route::get('/example1', function () {
    throw new \App\Exceptions\InternalException('系统内部错误', '系统内部错误', '106');
});
//队列
Route::get('store','ErrorController@store');
//随机数
Route::get('ship','ErrorController@ship');

/*Route::group([
    //路由前缀
    'prefix'        => config('admin.route.prefix'),
    //命名空间
    'namespace'     => config('admin.route.namespace'),
    //中间间
    'middleware'    => config('admin.route.middleware'),
], function ( ) {

    $router->get('/', 'HomeController@index');

});*/
