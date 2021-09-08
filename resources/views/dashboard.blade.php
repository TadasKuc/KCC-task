<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    @foreach($products as $product)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('storage/images/'.$product->image->path) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"> {{$product -> title}}</h5>
                <p class="card-text"> {{$product -> description}}.</p>
                <a href="#" class="btn btn-primary">More info</a>
            </div>
            <form action="{{ route('products.destroy' , ['product' => $product->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <input class="btn btn-outline-danger" type="Submit" value="Delete">
            </form>
        </div>
    @endforeach
</x-app-layout>
