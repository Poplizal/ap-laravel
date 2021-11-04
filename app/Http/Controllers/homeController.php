<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use App\Models\post_category;
use Illuminate\Support\Facades\Auth;

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
        $data=posts::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=post_category::all();
         return view('newPost',compact('categories'));
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
            'category'=>'required',
        ]);
        posts::create([
            'name'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$request->category,
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
        if($post->user_id != Auth::user()->id){
            abort(403);
        }
    // public function post_category()
        // dd($post);
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
        // if(posts::findOrFail($id)->user_id != Auth::user()->id){
        //     abort(403);
        // }
        // $this->authorize('view', $post);
    $this->authorize('view',posts::findOrFail($id));
    $categories=post_category::all();
    $datatoEdit=posts::findOrFail($id);
    return view("edit",compact('datatoEdit','categories'));
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
            'category'=>'required',
        ]);
   posts::where('id',$id)->update([
'name'=>$request->title,
'description'=>$request->description,
'category_id'=>$request->category,
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
