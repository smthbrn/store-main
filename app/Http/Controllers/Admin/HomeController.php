<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Blog\Post\Post;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brands_count=Brand::all()->count();
        $products_count=Product::all()->count();
        $posts_count=Posts::all()->count();
        $users_count=User::all()->count();
        $categories_count=Categories::all()->count();
        $tags_count=Tag::all()->count();
        $types_count=Type::all()->count();
        return view('admin_panel.index',[
            'posts_count'=>$posts_count,
            'users_count'=>$users_count,
            'categories_count'=>$categories_count,
            'products_count'=>$products_count,
            'brands_count'=>$brands_count,
            'tags_count'=>$tags_count,
            'types_count'=>$types_count
        ]);
    }
}
