<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
    )
    {
        $data=posts::orderBy('id','desc')->get();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('newPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
        posts::create([
            'name'=>$request->title,
            'description'=>$request->description,
        ]);
        // $post=new posts();
        // $post->name=$request->title;
        // $post->description=$request->description;
        // $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Route model binding
    public function show(posts $post)
    {
    // public function post_category()
        dd($post);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $datatoEdit=posts::findOrFail($id);
    return view("edit",compact('datatoEdit'));
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
        $request->validate([
            'title'=>"required|max:255",
            'description'=>"required|max:255",
        ]);
   posts::where('id',$id)->update([
'name'=>$request->title,
'description'=>$request->description,
   ]);
    // $datatoUpdate=posts::findOrFail($id);
    // $datatoUpdate->name=$request->title;
    // $datatoUpdate->description=$request->description;
    // $datatoUpdate->save();
    return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        posts::findOrFail($id)->delete();
        return redirect('/posts');
    }
}
