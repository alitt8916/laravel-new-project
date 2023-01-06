<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = form::all();
        return view('admin.home.index' , compact('home'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::make($request->all() , [
            'title'=>'required',
            'job'=>'required',
            'link'=>'required',
            'subject'=>'required',
            
        ],[
            'title.required'=>'جون جدت تایتل بزن',
            'subject.required'=>'بی سابجکت نمیزارم بری',
            
        ])->validate();


        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/home' , $image);
        }

        form::create([
            'image'=>$image,
            'title'=>$request->title,
            'subject'=>$request->subject,
            'job'=>$request->job,
            'description'=>$request->description,
            'link'=>$request->link,
        ]);

        return redirect()->route('home-page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $home = form::findOrFail($id);
        return view('admin.home.edit' , compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Validator::make($request->all() , [
            'title'=>'required',
            'job'=>'required',
            'link'=>'required',
            'subject'=>'required',
            
        ],[
            'title.required'=>'جون جدت تایتل بزن',
            'subject.required'=>'بی سابجکت نمیزارم بری',
            
        ])->validate();
        $home = form::findOrFail($id);
        $file = $request->file('image');
        $image = "";
        if (!empty($file)) {
            if(file_exists('admin/images/home/'.$home->image )){
                unlink('admin/images/home/'.$home->image);
            }

            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/home' , $image);
            # code...
        }else{
            $image = $home->image;
        }

        $home->update([
            'image'=>$image,
            'title'=>$request->title,
            'job'=>$request->job,
            'subject'=>$request->subject,
            'link'=>$request->link,
            'description'=>$request->description,
            
        ]);

        return redirect()->route('home-page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home = form::findOrFail($id);
        
        if(file_exists('admin/images/home/'.$home->image )){
                unlink('admin/images/home/'.$home->image);
        }

        
        $home->destroy($id);
        return redirect()->route('home-page.index');
    }
    
}
