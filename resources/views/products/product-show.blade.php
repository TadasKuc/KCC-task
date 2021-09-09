<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('storage/images/'. $product->image->image_name) }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"> {{$product -> title}}</h5>
        <p class="card-text"> {{$product -> description}}.</p>
    </div>
    @auth()
       <div style="display: flex; margin-left: 10px">
           <form action="{{ route('products.destroy' , ['product' => $product->id]) }}" method="POST">
               @method('DELETE')
               @csrf
               <input class="btn btn-outline-danger" type="Submit" value="Delete">
           </form>
           <a href="{{ route('products.edit' , ['product' => $product->id]) }}">
               <input class="btn btn-outline-info" type="Submit" value="Edit">
           </a>
       </div>
    @endauth
</div>

