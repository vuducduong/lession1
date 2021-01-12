<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return       view('back-end.home');
    }
    public function list(){
        $products = Product::all();
        return view('back-end.product-list',compact('products'));
    }


    public function create()
    {
        return view('back-end.product-create');
    }


    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('image')) {
            $pathImage = $request->file('image')->store('public/images');
            $product->image = $pathImage;}
        $product->save();
        return redirect()->route('product.list');
    }

    public function show(Product $product)
    {

    }


    public function edit($id)
    {
        $value = Product::findorfail($id);
        return view('back-end.product-update',compact('value'));
    }


    public function update(ProductRequest $request,$id)
    {
        $product = Product::findorfail($id);
        $product->fill($request->all());
        $product->save();
        return redirect()->route('product.list');
    }



    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $product->delete();
        return redirect()->route('product.list');
    }
    public function search(Request $request){
            $search = $request->input('search');
            $products  = Product::where('name','like',"%$search%")->get();
            return view('back-end.product-list',compact('products'));
    }

}
