<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
	Route::prefix('categories')->group(function(){
		Route::get('/', 'categoriesController@index')->name('categories.index');;
		Route::get('create','categoriesController@create')->name('categories.create');
		Route::post('store','categoriesController@store')->name('categories.store');
		Route::get('edit/{id}','categoriesController@edit')->name('categories.edit');
		Route::post('update/{id}','categoriesController@update')->name('categories.update');
		Route::get('destroy/{id}','categoriesController@destroy')->name('categories.destroy');
	});
	
	Route::prefix('publisher')->group(function(){
		Route::get('/', 'publisherController@index')->name('publisher.index');;
		Route::get('create','publisherController@create')->name('publisher.create');
		Route::post('store','publisherController@store')->name('publisher.store');
		Route::get('edit/{id}','publisherController@edit')->name('publisher.edit');
		Route::post('update/{id}','publisherController@update')->name('publisher.update');
		Route::get('destroy/{id}','publisherController@destroy')->name('publisher.destroy');
	});

	Route::prefix('shelves')->group(function(){
		Route::get('/', 'shelvesController@index')->name('shelves.index');;
		Route::get('create','shelvesController@create')->name('shelves.create');
		Route::post('store','shelvesController@store')->name('shelves.store');
		Route::get('edit/{id}','shelvesController@edit')->name('shelves.edit');
		Route::post('update/{id}','shelvesController@update')->name('shelves.update');
		Route::get('destroy/{id}','shelvesController@destroy')->name('shelves.destroy');
		Route::get('bin','shelvesController@bin')->name('shelves.bin');
		Route::get('rollback/{id}','shelvesController@rollback')->name('shelves.rollback');
		Route::get('delete/{id}','shelvesController@delete')->name('shelves.delete');
	});

	Route::prefix('books')->group(function(){
		Route::get('/', 'booksController@index')->name('books.index');;
		Route::get('create','booksController@create')->name('books.create');
		Route::post('store','booksController@store')->name('books.store');
		Route::get('edit/{id}','booksController@edit')->name('books.edit');
		Route::post('update/{id}','booksController@update')->name('books.update');
		Route::get('destroy/{id}','booksController@destroy')->name('books.destroy');
		Route::get('bin','booksController@bin')->name('books.bin');
		Route::get('rollback/{id}','booksController@rollback')->name('books.rollback');
		Route::get('delete/{id}','booksController@delete')->name('books.delete');
	});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
