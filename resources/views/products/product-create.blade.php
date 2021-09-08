<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" style="width: 200px;">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control"  placeholder="Enter product title">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input name="description" type="text" class="form-control"  placeholder="Short description">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="number" class="form-control"  placeholder="Price in Eu">
        </div>
        <div class="form-group">
            <label for="image">Example file input</label>
            <input name="image" type="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</x-app-layout>


