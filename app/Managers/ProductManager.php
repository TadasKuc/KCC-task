<?php


namespace App\Managers;


use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductManager
{

    /**
     * ProductManager constructor.
     */
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function store(Request $request)
    {
        $this->validateProductRequest($request);

        $this->productRepository->store($request);
    }

    public function update(Request $request, Product $product)
    {
        $this->validateProductRequest($request);

        $this->productRepository->update($request, $product);
    }

    public function destroy($id)
    {
        $this->productRepository->destroy($id);
    }

    public function validateProductRequest()
    {
        return request()->validate([
            'title' => ['required', 'min:5', 'max:20'],
            'description' => ['required', 'min:5', 'max:250'],
            'price' => ['required', 'min:1', 'max:999']
        ]);
    }

}
