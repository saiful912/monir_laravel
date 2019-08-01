@extends('frontend.layouts.master')
@section('main')
    {{--start sidebar+content--}}
    <div class="row margin-top">
        <div class="container">
            <div class="our-carousel mb-3">
                <div id="sliderExampleIndicators" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach($sliders as $slider)
                            <li data-target="#sliderExampleIndicators" data-slide-to="{{$loop->index}}"
                                class="{{$loop->index == 0 ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        @foreach($sliders as $slider)
                            <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                                <img class="d-block w-100" src="{{asset('images/sliders/'.$slider->image)}}"
                                     alt="{{$slider->title}}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$slider->title}}</h5>
                                    @if($slider->button_text)
                                        <p>
                                            <a href="{{$slider->button_link}}" target="_blank"
                                               class="btn btn-danger">{{$slider->button_text}}</a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#sliderExampleIndicators" data-slide="prev" role="button">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#sliderExampleIndicators" data-slide="next" role="button">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            @include('frontend.partials.sidebar')
        </div>
        <div class="col-md-8">
            <div class="widget">
                <h3 class="font-weight-bold mb-3 text-center">Our Products</h3>
                @include('frontend.pages.product.partials.master_products')
                <div class="widget">

                </div>
            </div>
        </div>
    </div>

@stop
<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

{{--jquery ajax something problem--}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToCart(product_id) {
        $.post('https://monir_laravel.test/api/carts/store',
            {
                product_id: product_id
            })
            .done(function (data) {
                data = JSON.parse(data);
                if (data.status === 'success') {
                    //toast css js include baki ace
                    alertify.set('notifier',position('top-center'));
                    alertify.success('Item added to cart successfully || total Items: '+data.totalItems+'</br> to checkout ' +
                        '<a href="{{route('carts')}}">Go to checkout page</a>');
                    $('#totalItems').html(data.totalItems);
                }
            });
    }
</script>

