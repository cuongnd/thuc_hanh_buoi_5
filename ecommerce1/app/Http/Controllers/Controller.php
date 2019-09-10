<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\models\Content;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function insert_new(Request $request){
        $title=$request->title;
        $content=new Content();
        $content->title=$title;
        $content->category_id=0;
        $content->alias="";
        $content->image_intro="";
        $content->short_description="";
        $content->full_description="";
        $content->publish=1;
        $content->ordering=1;
        $content->hot_new=1;
        $content->save();

    }
}
