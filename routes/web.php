<?php

date_default_timezone_get();

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

// php file generators from laravel exist in "php artisan make"

Route::get('/', function () {
    // pass arguments as list
    return view('welcome', ["user" => "Li Qun"]);
});

Route::get('/about', function () {
    $day = date("l");
    // different syntax for passing arguments
    return view('about')->with("name", "beautiful $day !");
});

Route::get('/tasks', function () {
    // this tasks thing can be from API or anywhere else
    $tasks = [
        "Go pay phone bill",
        "ask about health checkup",
        "ask the ward office about the tax thing",
        "get 住民票",
        "ask about the company change notice for immigration"
    ];

    $name = "Li Qun";

    return view('tasks', compact('tasks', "name"));
});

Route::get('/database', function () {
    // get stuff from database
    $db = 'tasks';

    // here's some magic connection stuff using Illuminate
    $db_tasks = DB::table('tasks')
        ->latest()
        ->get();

    //print $db_tasks;

    // return a collection of objects (dictionary/json)
    return view('database/index', ["db" => $db, "tasks" => $db_tasks]);
});

Route::get('/database/json', function () {
    // if i return a database query, it automatically turns it into a json

    // SO APIS ARE SUPER SIMPLE
    // 1. listen to api
    // 2. call DB
    // 3. return DB

    // this is actually laravel's query builder

    $db_tasks = DB::table('tasks')->get();

    // autoconverts into json
    return $db_tasks;
});

Route::get('/database/{id}', function ($id) {
    $db_task = DB::table('tasks')->find($id);

    //dd($db_task->{'in progress'});

    return view('database/show', ["db" => $db_task]);
});
