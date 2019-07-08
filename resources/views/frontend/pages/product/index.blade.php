@extends('frontend.layouts.master')
@section('main')
    {{--start sidebar+content--}}
    <div class="row margin-top">
        <div class="col-md-4">
            @include('frontend.partials.sidebar')
        </div>
        <div class="col-md-8">
            <div class="widget">
                <h3>Products</h3>
                @include('frontend.pages.product.partials.master_products')
                <div class="widget">

                </div>
            </div>
        </div>
    </div>
@stop
<script src="{{mix('js/app.js')}}"></script>

