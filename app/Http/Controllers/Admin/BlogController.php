<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use voku\helper\ASCII;
use function React\Promise\reduce;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $posts=Posts::all();
        return view('admin_panel.blog.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {  $post=new Posts();
       $post->title=$request->input('title');
       $post->text=$request->input('text');
       $post->type_id=$request->input('type_id');
        $post->tag_id=$request->input('tag_id');
        if (isset($request->img)) {
            $img = $request->img;
            $imageName = time() . '.' . $request->img->extension();
            $imageDestinationPath = public_path('images/posts/');
            $img->move($imageDestinationPath, $imageName);
            $post->img = 'posts/' . $imageName;
        }

        $post->save();
        return redirect()->route('blog.create')->with('success', 'Post is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    { $post=new Posts();
       return view('admin_panel.blog.details',['post'=>$post->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        return view('admin_panel.blog.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $post=Posts::find($id);
        $post->title=$request->input('title');
        $post->text=$request->input('text');
        $post->type_id=$request->input('type_id');
        $post->tag_id=$request->input('tag_id');
        if (isset($request->img)) {
            $img = $request->img;
            $imageName = time() . '.' . $request->img->extension();
            $imageDestinationPath = public_path('images/posts/');
            $img->move($imageDestinationPath, $imageName);
            $post->img = 'posts/' . $imageName;
        }
        if (!is_null($post->img)) {
            File::delete($post->img);
        }
        $post->save();
        return redirect()->route('blog.show',$post)->with('success', 'Post is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */
    public function destroy($id)
    {
        Posts::find($id)->delete();
//        if (!is_null(Posts::find($id)->img)) {
//            File::delete(Posts::find($id)->img);
//        }
        return redirect()->route('blog.index')->with('success','Post is deleted successfully');
    }
}
