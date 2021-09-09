<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>All Products</h2>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product title</th>
                            <th scope="col">Product price</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                           <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td><a href="{{ route('products.show', $product) }}">{{$product->title}}</a></td>
                                <td>{{$product->price}} Eur</td>
                                <td>
                                    <img class="card-img-top"
                                         src="{{asset('storage/images/'.$product->image->image_name) }}"
                                         alt="Card image cap"
                                         style="max-height: 50px;
                                                object-fit: scale-down;">
                                </td>
                                <td>
                                    <input class="btn btn-outline-info" type="Submit" value="Edit">
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy' , ['product' => $product->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-outline-danger" type="Submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
