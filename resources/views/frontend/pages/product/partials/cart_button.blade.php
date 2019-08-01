
 {{--jquery ajax something problem--}}
{{--<form class="form-inline" action="{{route('carts.store')}}" method="post">--}}
    {{--@csrf--}}
    {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}
    {{--<button type="button" class="btn btn-primary" onclick="addToCart({{$product->id}})"><i class="fa fa-plus"></i>Add to Cart</button>--}}
{{--</form>--}}

<form class="form-inline" action="{{route('carts.store')}}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add to Cart</button>
</form>