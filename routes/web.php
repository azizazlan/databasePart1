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

// Revision
Route::get('/admin', function () {
    dd('wecome to admin!');
});

//Revision
Route::get('/admin/user/{id}', function ($id) {
    dd('wecome to admin, user with id ' . $id);
});

Route::get('/programs/listPrograms', 'ProgramsController@listPrograms')->name(
    'programs.list'
);

Route::get('/programs/findbyid/{id}', 'ProgramsController@findProgram');

Route::get(
    '/programs/findbyname/{name}',
    'ProgramsController@findProgramsByName'
);

Route::get('/programs/create/', 'ProgramsController@createProgram');

Route::post('/programs/create', 'ProgramsController@saveProgram')->name(
    'programs.save'
);

Route::get('programs/edit/{id}', 'ProgramsController@editProgram')->name(
    'programs.edit'
);

Route::post('programs/edit/', 'ProgramsController@updateProgram')->name(
    'programs.update'
);

Route::post('programs/search/', 'ProgramsController@searchProgram')->name(
    'programs.search'
);

Route::get('programs/delete/{id}', 'ProgramsController@deleteProgram')->name(
    'programs.delete'
);
