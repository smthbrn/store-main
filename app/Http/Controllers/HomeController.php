<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        $categories=Categories::all();
        $products = Product::all();
        $posts = Posts::all();
        return view('welcome', ['categories' => $categories, 'products' => $products, 'posts' =>$posts]);
    }
    public function about_us()
    {
        return view('about_us');
    }

    public function productbycategory(Request $request, $id){
        $products = Product::where('category_id', $id) -> get();
        return view('productbycategory', ['products'=>$products]);
    }

    public function post_info($id){
        $post=Posts::find($id);
        $posts = Posts::all();
        return view('shop-detail',['post'=>$post, 'posts' => $posts]);
    }
}
