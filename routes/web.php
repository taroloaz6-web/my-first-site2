<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    $username = 'John';
    /* return view('welcome', [
        'name' => $username,
        'day'=>"Hétfő",
        'number'=>1,
        'logikai'=>true
    ]);*/
    return view('welcome')->withName($username)->withDay('Hétfő')->withNumber(1)->withLogikai(true);
});

Route::get('/pass-array', function () {
    $tasks = ['Elmenni a boltba', 'Elmenni a piacra', 'Elmenni a munkahelyre'];

    /*return view('taskslist',[
        'tasks'=>$tasks
    ]);*/
    //with(MI LEGYEN A VÁLTOZÓ NEVE A VIEWBEN, with után nagybetű!!!!!)
    //return view('taskslist')->withTasks($tasks);
    return view('taskslist')->with([
        'tasks' => $tasks,
    ]);
});
Route::view('/contact', 'contact');

Route::get('/request-test',function (){
    return view('request-inputs')->with([
        'title'=>request('title')
    ]);
});


/*Route::get('/posts/{post}',function ($post){
    $posts=[
        "first-post"=>"Ez az elso posztom, nagyon jo poszt!",
        "second-post"=>"Ez a masodik posztom, ez nem jobb mint az elso!"
    ];

    if (!array_key_exists($post,$posts))
    {
        abort(404);
    }
    return view('post')->with([
        'post'=>$posts[$post] ?? "EZ még nem létezik!"
    ]);
});*/

Route::get('/posts/{post}',[PostController::class,'show']);
