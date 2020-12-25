<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin_panel.products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->status=$request->input('status');
        $product->rating=$request->input('rating');
        $product->reviews=$request->input('reviews');
        $product->quantity=$request->input('quantity');
        $product->category_id=$request->input('category_id');
        $product->brand_id=$request->input('brand_id');
        if (isset($request->img)) {
            $img = $request->img;
            $imageName = time() . '.' . $request->img->extension();
            $imageDestinationPath = public_path('images/products/');
            $img->move($imageDestinationPath, $imageName);
            $product->img = 'products/' . $imageName;
        }
        $product->save();
        return redirect()->route('product.create')->with('success', 'Product is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin_panel.products.details',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $product=Product::find($id);
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->status=$request->input('status');
        $product->rating=$request->input('rating');
        $product->reviews=$request->input('reviews');
        $product->quantity=$request->input('quantity');
        $product->category_id=$request->input('category_id');
        $product->brand_id=$request->input('brand_id');
        if (isset($request->img)) {
            $img = $request->img;
            $imageName = time() . '.' . $request->img->extension();
            $imageDestinationPath = public_path('images/products/');
            $img->move($imageDestinationPath, $imageName);
            $product->img = 'products/' . $imageName;
        }
        if (!is_null($product->img)) {
            File::delete($product->img);
        }
        $product->save();
        return redirect()->route('product.show',$product)->with('success', 'Product is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Product is deleted successfully');
    }
}
