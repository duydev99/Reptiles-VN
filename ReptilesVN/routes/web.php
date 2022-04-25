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


Route::get('/', function () {
    return view('client/body');
})->name('client');

Route::get('/about', function () {
    return view('client/about');
})->name('about');

Route::get('/logout', function () {
    Session::flush();
    return redirect(route('login'));
})->name('logout');

Route::get('/login', function () {
    return view('client/login');
})->name('login');


Route::get('/master', function () {
    if(!Session::has('user')) return view('client/login');
    else return view('master/index');
})->name('master');




//gioi
Route::get('kingdom_management/list','GioiController@index');
Route::post('kingdom_management/create','GioiController@create');
Route::get('kingdom_management/create', function () {
    return view('master/kingdom_add');
})->name('kingdom_add');
Route::get('kingdom_management', function () {
    return view('master/kingdom_management');
})->name('kingdom_management');

Route::get('kingdom_management/edit/{id}','GioiController@edit');

Route::post('kingdom_management/edit/{id}','GioiController@update');

Route::post('kingdom_management/del/{id}','GioiController@delete');


//nganh
Route::get('phylum_management', function () {
    return view('master/phylum_management');
})->name('phylum_management');

Route::get('phylum_management/list','NganhController@index');
Route::post('phylum_management/create','NganhController@create');
Route::get('phylum_management/create', function () {
    return view('master/phylum_add');
})->name('phylum_add');

Route::get('phylum_management/edit/{id}','NganhController@edit');

Route::post('phylum_management/edit/{id}','NganhController@update');

Route::post('phylum_management/del/{id}','NganhController@delete');

// lop
Route::get('class_management', function () {
    return view('master/class_management');
})->name('class_management');

Route::get('class_management/list','LopController@index');
Route::post('class_management/create','LopController@create');
Route::get('class_management/create', function () {
    return view('master/class_add');
})->name('class_add');

Route::get('class_management/edit/{id}','LopController@edit');

Route::post('class_management/edit/{id}','LopController@update');

Route::post('class_management/del/{id}','LopController@delete');


//bo
Route::get('order_management', function () {
    return view('master/order_management');
})->name('order_management');

Route::get('order_management/list','BoController@index');
Route::post('order_management/create','BoController@create');
Route::get('order_management/create', function () {
    return view('master/order_add');
})->name('order_add');

Route::get('order_management/edit/{id}','BoController@edit');

Route::post('order_management/edit/{id}','BoController@update');

Route::post('order_management/del/{id}','BoController@delete');


//ho
Route::get('family_management', function () {
    return view('master/family_management');
})->name('family_management');

Route::get('family_management/list','HoController@index');
Route::post('family_management/create','HoController@create');
Route::get('family_management/create', function () {
    return view('master/family_add');
})->name('family_add');

Route::get('family_management/edit/{id}','HoController@edit');

Route::post('family_management/edit/{id}','HoController@update');

Route::post('family_management/del/{id}','HoController@delete');


//nguoi dung
Route::get('user_management', function () {
    return view('master/user_management');
})->name('user_management');

Route::get('user_management/list','NguoiDungController@index');
Route::post('user_management/create','NguoiDungController@create');
Route::get('user_management/create', function () {
    return view('master/user_add');
})->name('user_add');

Route::get('user_management/edit/{id}','NguoiDungController@edit');

Route::post('user_management/edit/{id}','NguoiDungController@update');

Route::post('user_management/del/{id}','NguoiDungController@delete');
Route::post('login','NguoiDungController@submitLogin')->name('submitLogin');


//mau vat
Route::post('/','MauVatController@content');
Route::post('/search/{text}','MauVatController@search');
Route::get('/search/{text}', function () {
    return view('client/search');
})->name('search');

Route::post('/find/{key}','MauVatController@find');
Route::get('/find/{key}', function () {
    return view('client/find');
})->name('find');

Route::get('post/detail/{id}', function () {
    return view('client/detail');
});
Route::post('post/detail/{id}','MauVatController@detail');

Route::get('post_management/list','MauVatController@confirm');
Route::post('post_management/post/{id}','MauVatController@posts');
Route::get('post_management/', function () {
    return view('master/post_management');
})->name('post_management');
Route::post('post/create','MauVatController@create');
Route::get('post/create', function () {
    return view('master/post_create');
})->name('post_create');

Route::get('post/list','MauVatController@index');
Route::get('post/', function () {
    return view('master/post_list');
})->name('post_list');



Route::get('post/edit/{id}', function () {
    return view('master/post_update');
});
Route::post('post/edit/{id}','MauVatController@edit');

Route::post('post/update/{id}','MauVatController@update');
Route::post('post/del/{id}','MauVatController@delete');

//mo ta
Route::get('description_management', function () {
    return view('master/description_management');
})->name('description_management');

Route::get('description_management/list','MoTaController@index');
Route::post('description_management/create','MoTaController@create');
Route::get('description_management/create', function () {
    return view('master/description_add');
})->name('description_add');

Route::get('description_management/edit/{id}','MoTaController@edit');

Route::post('description_management/edit/{id}','MoTaController@update');

Route::post('description_management/del/{id}','MoTaController@delete');



// sinh vat
Route::post('creature/create','SinhVatController@create');
Route::post('creature/edit/{id}','SinhVatController@edit');
//mota sinh vat
Route::post('creature_description/create','MoTaSinhVatController@create');
Route::post('creature_description/edit','MoTaSinhVatController@edit');


//image
Route::get('image/{id}', function () {
    return view('master/image_upload');
});
Route::post('image/{id}','ImageController@load');

Route::post('image/upload/{id}','ImageController@upload');
Route::post('image/del/{id}','ImageController@delete');


//video
Route::get('video/{id}', function () {
    return view('master/video_upload');
});
Route::post('video/{id}','VideoController@load');

Route::post('video/upload/{id}','VideoController@upload');
Route::post('video/del/{id}','VideoController@delete');