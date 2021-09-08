<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form action="{{route('products.update', [$product->id])}}" method="post" enctype="multipart/form-data" style="width: 200px;">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control"  placeholder="Enter product title" value="{{$product->title}}">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input name="description" type="text" class="form-control"  placeholder="Short description" value="{{$product->description}}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="number" class="form-control"  placeholder="Price in Eu" value="{{$product->price}}">
        </div>
        <img class="card-img-top" src="{{asset('storage/images/'.$product->image->path) }}" alt="Card image cap">
        <div class="form-group">
            <label for="image">Select new picture</label>
            <input name="image" type="file" class="form-control-file" value="{{$product->image->path}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</x-app-layout>



