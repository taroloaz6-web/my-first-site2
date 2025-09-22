<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //GET KÉRÉSHEZ TARTOZÓ FUNCKIÓ

    public function show($post){
         $posts=[
        "first-post"=>"Ez az elso posztom, nagyon jo poszt!",
        "second-post"=>"Ez a masodik posztom, ez nem jobb mint az elso!"
    ];
    if (!array_key_exists($post,$posts))
    {
        abort(404);
    }
       // return $post;
         return view('post')->with([
        'post'=>$posts[$post] ?? "EZ még nem létezik!"
    ]);
    }
}
