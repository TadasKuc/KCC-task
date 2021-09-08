<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        return view('dashboard', [
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
        $image->image_name = $this->savePhoto($request);
        $image->save();

        return redirect(route('products.index'));
    }

    public function show(Product $product)
    {
        return view('products.product-show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.product-edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->title             = $request->get('title');
        $product->description       = $request->get('description');
        $product->price             = $request->get('price');
        $product->image->image_name = $this->savePhoto($request);
        $product->push();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->image()->delete();
        $product->delete();

        return redirect(route('products.index'));
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
