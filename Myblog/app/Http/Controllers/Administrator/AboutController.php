<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
  
    public function index()
    {

        $about = About::all();
        return view('admin/about/index' , compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'description'=>'required',
            'link'=>'required',
           
            
        ],[
            'title.required'=>'جون جدت تایتل بزن',
            'subject.required'=>'بی سابجکت نمیزارم بری',
            
        ])->validate();

        About::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
        ]);

        return redirect()->route('about.index');
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
        $about = About::findOrFail($id);
        return view('admin.about.edit' , compact('about'));
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
            'description'=>'required',
            'link'=>'required',
           
            
        ],[
            'title.required'=>'جون جدت تایتل بزن',
            'subject.required'=>'بی سابجکت نمیزارم بری',
            
        ])->validate();
        $about = About::findOrFail($id);
        $about->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
        ]);

        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->destroy($id);
        return redirect()->route('about.index');
         
    }
}
