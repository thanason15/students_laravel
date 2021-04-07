<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        // $data = Post::latest()->paginate(5);
        // $data = Post::first()->paginate(5);
        //  return view('posts.index', compact('data'))
        //  ->with('i',(request()->input('page',1) -1 ) *5 );
        // return view('posts');

        $data = Post::orderBy('id','asc')->paginate(5);
        return view('posts.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
       
        $request->validate([
            'main_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
        ]);
       $chackid = Post::where('main_id',$request->main_id)->first();
    //    dd($chackid);
    //    die;
        if(!empty($chackid)){
            return redirect()->route('posts.index')
                        ->with('error','รหัสนี้มีอยู่แล้ว !!!');
        }else{
            Post::create($request->all());
            return redirect()->route('posts.index')
                        ->with('success','เพิ่มข้อมูลสำเร็จเเล้ว.');
        }
       
     
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'main_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'subject' => 'required',
            'score' => 'required',
            'grade'  => 'required',

            ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success','เพิ่มข้อมูลสำเร็จเเล้ว.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index')->with('success','ลบข้อมูลสำเร็จเเล้ว.');
    }
}
