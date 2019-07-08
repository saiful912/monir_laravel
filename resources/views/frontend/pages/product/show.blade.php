@extends('frontend.layouts.master')
@section('title')
    {{$products->title}} | Laravel Ecommerce Site
@endsection

@section('main')
    {{--start sidebar+content--}}
   <div class="container margin-top-20">
       <div class="row">
           <div class="col-md-4">
               <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                   <div class="carousel-inner mt-3">
                       @php $i=1; @endphp
                       @foreach($products->images as $image)
                           <div class="carousel-item {{$i==1 ? 'active':''}}">
                               <img class="d-block w-75 h-50" src="{!! asset('images/products/'.$image['image']) !!}" alt="First Slide">
                           </div>
                           @php $i++; @endphp
                        @endforeach
                   </div>
                   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span class="sr-only">Previous</span>
                   </a>
                   <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                       <span class="sr-only">Next</span>
                   </a>
               </div>
           </div>

           <div class="col-md-8">
               <div class="widget">
                   <h3 class="mt-3">{{$products->title}}</h3>
                   <h3 class="mt-3">BDT : {{$products->price}}Tk
                       <span class="badge badge-primary">
                            {{$products->quantity < 1 ? 'No item is available' : $products->quantity.' item in stock'}}
                       </span>
                   </h3>
                   <hr>
                   <div class="product-description">
                       {!! $products->description !!}
                   </div>
               </div>
           </div>
       </div>
   </div>
@stop
<script src="{{mix('js/app.js')}}"></script>