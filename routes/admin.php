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
Route::namespace('Admin')->group(function () {
    #################################login##############################################
    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('/login', 'LoginController@getLogin')->name('get.admin.login');
        Route::post('/login', 'LoginController@login')->name('admin.login');
        
    });


    Route::group(['middleware' => 'auth:admin'], function () {

        Route::prefix('admin')->group(function () {
            Route::get('/', 'AdminController@index')->name('get.admin.index');
            Route::get('create', 'AdminController@create')->name('get.admin.create');
            Route::post('create', 'AdminController@store')->name('post.admin.create');
            Route::get('edit/{id}', 'AdminController@edit')->name('get.admin.edit');
            Route::post('edit/{id}', 'AdminController@update')->name('post.admin.edit');
            Route::get('delete/{id}', 'AdminController@destroy')->name('get.admin.delete');
        });

        ##############################logout##############################################
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');


        ##############################dashboard##############################################
        Route::get('/', 'dashboardController@index')->name('get.admin.dashboard');


        ##############################main-category##############################################
        Route::prefix('main-category')->group(function () {
            Route::namespace('category')->group(function () {
                Route::get('/', 'MainCategoryController@index')->name('get.admin.main-category');
                Route::get('/create', 'MainCategoryController@create')->name('get.admin.main-category.create');
                Route::post('/create', 'MainCategoryController@store')->name('post.admin.main-category.create');
                Route::get('/edit/{id}', 'MainCategoryController@edit')->name('get.admin.main-category.edit');
                Route::post('/edit/{id}', 'MainCategoryController@update')->name('post.admin.main-category.edit');
                Route::get('/delete/{id}', 'MainCategoryController@destroy')->name('get.admin.main-category.delete');
            });
        });
        ##############################sub-category##############################################
        Route::prefix('sub-category')->group(function () {
            Route::namespace('category')->group(function () {
                Route::get('/', 'SubCategoryController@index')->name('get.admin.sub-category');
                Route::get('/create', 'SubCategoryController@create')->name('get.admin.sub-category.create');
                Route::post('/create', 'SubCategoryController@store')->name('post.admin.sub-category.create');
                Route::get('/edit/{id}', 'SubCategoryController@edit')->name('get.admin.sub-category.edit');
                Route::post('/edit/{id}', 'SubCategoryController@update')->name('post.admin.sub-category.edit');
                Route::get('/delete/{id}', 'SubCategoryController@destroy')->name('get.admin.sub-category.delete'); 
            });
        });

        ##################################teacher##############################################
        Route::prefix('teacher')->group(function () {
                Route::get('/', 'TeacherController@index')->name('get.admin.teacher');
                Route::get('/create', 'TeacherController@create')->name('get.admin.teacher.create');
                Route::post('/create', 'TeacherController@store')->name('post.admin.teacher.create');
                Route::get('/edit/{id}', 'TeacherController@edit')->name('get.admin.teacher.edit');
                Route::post('/edit/{id}', 'TeacherController@update')->name('post.admin.teacher.edit');
                Route::get('/delete/{id}', 'TeacherController@destroy')->name('get.admin.teacher.delete');
                Route::get('/approve/{id}', 'TeacherController@approve')->name('get.admin.teacher.approve');
        });

        ##################################student##############################################
        Route::prefix('student')->group(function () {
                Route::get('/', 'StudentController@index')->name('get.admin.student');
                Route::get('/create', 'StudentController@create')->name('get.admin.student.create');
                Route::post('/create', 'StudentController@store')->name('post.admin.student.create');
                Route::get('/edit/{id}', 'StudentController@edit')->name('get.admin.student.edit');
                Route::post('/edit/{id}', 'StudentController@update')->name('post.admin.student.edit');
                Route::get('/delete/{id}', 'StudentController@destroy')->name('get.admin.student.delete');
        });
        ##################################course##############################################
        Route::prefix('course')->group(function () {
                Route::get('/', 'CourseController@index')->name('get.admin.course');
                Route::get('/create', 'CourseController@create')->name('get.admin.course.create');
                Route::post('/create', 'CourseController@store')->name('post.admin.course.create');
                Route::get('/edit/{id}', 'CourseController@edit')->name('get.admin.course.edit');
                Route::post('/edit/{id}', 'CourseController@update')->name('post.admin.course.edit');
                Route::get('/delete/{id}', 'CourseController@destroy')->name('get.admin.course.delete');
        });
        ##################################lesson##############################################
        Route::prefix('lesson')->group(function () {
                Route::get('/', 'LessonController@index')->name('get.admin.lesson');
                Route::get('/create', 'LessonController@create')->name('get.admin.lesson.create');
                Route::post('/create', 'LessonController@store')->name('post.admin.lesson.create');
                Route::get('/edit/{id}', 'LessonController@edit')->name('get.admin.lesson.edit');
                Route::post('/edit/{id}', 'LessonController@update')->name('post.admin.lesson.edit');
                Route::get('/delete/{id}', 'LessonController@destroy')->name('get.admin.lesson.delete');
        });
        ##################################purchase##############################################
        Route::prefix('purchase')->group(function () {
                Route::get('/', 'PurchaseController@index')->name('get.admin.purchase');
                Route::get('/create', 'PurchaseController@create')->name('get.admin.purchase.create');
                Route::post('/create', 'PurchaseController@store')->name('post.admin.purchase.create');
                Route::get('/edit/{id}', 'PurchaseController@edit')->name('get.admin.purchase.edit');
                Route::post('/edit/{id}', 'PurchaseController@update')->name('post.admin.purchase.edit');
                Route::get('/delete/{id}', 'PurchaseController@destroy')->name('get.admin.purchase.delete');
        });
        
    });
});