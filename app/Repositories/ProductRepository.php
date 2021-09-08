<?php


namespace App\Repositories;


use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRepository
{

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
