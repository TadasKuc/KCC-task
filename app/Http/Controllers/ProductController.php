<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        return view('welcome', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('products.product-create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->user_id     = Auth::user()->id;
        $product->title       = $request->get('title');
        $product->description = $request->get('description');
        $product->price       = $request->get('price');

        $product->save();

        $image = new Image();
        $image->product_id = $product->id;
        $image->path = $this->savePhoto($request);
        $image->save();
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('products.product-edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->title       = $request->get('title');
        $product->description = $request->get('description');
        $product->price       = $request->get('price');
        $product->image->path = $this->savePhoto($request);
        $product->push();
    }

    public function destroy($id)
    {
        //
    }

    public function savePhoto($request)
    {

        if($request->hasFile('image')) {

            $fileName = $request->get('title').'_'.$request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('public/images', $fileName);

        } else {
            $fileName = 'noimage.jpg';
        }

        return $fileName;
    }
}
