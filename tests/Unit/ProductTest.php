<?php

namespace Tests\Unit;


use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

      public function test_user_can_create_product()
    {
        $this->actingAs(User::factory()->create());

        $product = [
            'user_id'     => Auth::user()->id,
            'title'       => 'product title',
            'description' => 'product descriiption',
            'price'       => 55,
        ];

        $response = $this->post(route('products.store'), $product);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseCount(1, Product::all());
    }
}
