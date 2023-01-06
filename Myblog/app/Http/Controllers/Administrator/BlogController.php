<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view ('admin.blog.index' , compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/blog' , $image);

        };

        Blog::create([
            'image'=>$image,
            'title'=>$request->title,
            'description'=>$request->description,

        ]);

        return redirect()->route('blog.index');
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
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit' , compact('blog'));
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
        $blog = Blog::findOrFail($id);
        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            if(file_exists('admin/images/blog/'.$blog->image)){
                unlink('admin/images/blog/'.$blog->image);

            }

            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/blog' , $image);
        }else{
            $image = $blog->image;;
        }
        $blog->update([
            'image'=>$image,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if(file_exists('admin/images/blog'.$blog->image)){
            unlink('admin/images.blog'.$blog->image);

        }

        $blog->destroy($id);
        return redirect()->route('blog.index');
    }
}
