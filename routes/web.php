<?php

$router->group(['prefix'=>'v1/api'],function() use ($router){
    $router->post('login','AuthController@login');
    $router->post('register','AuthController@register');
    
   // $router->group(['middleware'=>'auth'],function() use ($router){

        $router->get('categories','CategoryController@index');
        $router->post('categories','CategoryController@store');
        $router->put('categories/{id}','CategoryController@update');
        $router->delete('categories/{id}','CategoryController@destroy');

        $router->get('news','NewsController@index');
        $router->post('news','NewsController@store');
        $router->put('news/{id}','NewsController@update');
        $router->delete('news/{id}','NewsController@destroy');
   // });

});