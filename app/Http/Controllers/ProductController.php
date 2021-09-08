<?php

namespace App\Http\Controllers;

use App\Managers\ProductManager;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /**
     * ProductController constructor.
     */
    public function __construct(private ProductManager $productManager)
    {
    }

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
        $this->productManager->store($request);

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
        $this->productManager->update($request, $product);

        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $this->productManager->destroy($id);

        return redirect(route('products.index'));
    }

}
