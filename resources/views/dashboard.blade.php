<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($products as $product)
            <div class="card" style="width: 18rem;">
                {{--            <img class="card-img-top" src="{{asset('storage/images/'. $product->image->image_name) }}" alt="Card image cap">--}}
                <img class="card-img-top" src="{{$product->image->image_name}}" alt="Card image cap">
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
                <a href="{{ route('products.show', $product) }}">Show</a>
            </div>
        @endforeach
    </div>

</x-app-layout>
