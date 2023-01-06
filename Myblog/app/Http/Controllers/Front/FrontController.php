<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\form;
use App\Models\Skill;

class FrontController extends Controller
{
    public function index(){
        $home = form::orderBy('id' , 'desc')->First();
        $about = About::orderBY('id' , 'desc')->First();
        $skill = Skill::orderBy('id' , 'desc')->take(4)->get();
        $blog = Blog::orderBy('id' , 'desc')->take(3)->get();

        return view('front.index' , compact('home' , 'about' , 'skill' , 'blog'));
    }

    public function blogDetail($id){

        $blog = Blog::findOrFail($id);

        return view('front.single' , compact('blog'));
    }
}
