<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group([
        'name'      => 'admin.',
        'prefix'    => 'admin'
    ],function(){
        Route::get('/dashboard', 'AdminController@index')->name('admin');
    }
);


Route::group([
        'name'      => 'user.',
        'prefix'    => 'user'
    ],function(){
        Route::get('/', function(){ return redirect(route('user'));} );
        Route::get('/dashboard', 'UserController@index')->name('user');
        Route::get('/article/edit/{id}', 'ArticleController@edit')->name('edit.article');
        Route::get('/article/delete/{id}', 'ArticleController@delete')->name('delete.article');
    }
);

Route::group([
        'name'      => 'manager.',
        'prefix'    => 'manager'
    ],function(){
        Route::get('/dashboard', 'ManagerController@index')->name('manager');
    }
);


Route::group([
        'name'  =>  'article.',
        'prefix'    => 'article'
    ],function(){
        Route::post('/add', 'ArticleController@add')->name('article.add');
    }
);


Route::get('/home', 'HomeController@index')->name('home');
