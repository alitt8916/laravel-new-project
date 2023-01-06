<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Skill;
// use Dotenv\Validator;
// use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;

class SkillController extends Controller
{
    
    public function index()
    {
        $skill = Skill::all();
        return view('admin.skill.index' , compact('skill'));
    }

 
    public function create()
    {
        return view('admin.skill.create');
    }

   
    public function store(Request $request)
    {
        Validator::make($request->all() , [
            'title'=>'required',
            'precentage'=>'required',
            
            
        ],[
            'title.required'=>'جون جدت تایتل بزن',
            'precentage.required'=>'بی سابجکت نمیزارم بری',
            
        ])->validate();
        Skill::create([
            'precentage'=>$request->precentage,
            'title'=> $request->title
        ]);


        return redirect()->route('skill.index');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit' , compact('skill'));
    }

    
     
    public function update(Request $request, $id)
    {
        Validator::make($request->all() , [
            'title'=>'required',
            'precentage'=>'required',
            
            
        ],[
            'title.required'=>'جون جدت تایتل بزن',
            'precentage.required'=>'بی سابجکت نمیزارم بری',
            
        ])->validate();
        $skill = Skill::findOrFail($id);
        $skill->update([
            'precentage'=>$request->precentage,
            'title'=>$request->title,
        ]);
        return redirect()->route('skill.index');
    }

   
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->destroy($id);
        return redirect()->route('skill.index');
    }
}
