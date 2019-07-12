<div class="row">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card">
                @php $i = 1; @endphp
                @foreach($product->images as $image)
                    @if($i>0)
                        <a href="{{route('products.show',$product->slug)}}">
                        <img class="card-image-top w-75 h-50" src="{{asset('images/products/'.$image->image)}}"
                             alt="{{$product->title}}">
                        </a>
                    @endif
                    @php $i--; @endphp

                @endforeach

                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{route('products.show',$product->slug)}}">{{$product->title}}</a>
                    </h4>
                    <p class="card-text">BDT-{{$product->price}} /-</p>
                    @include('frontend.pages.product.partials.cart_button')
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="pagination justify-content-center mt-5">
    {{$products->links()}}
</div>