@extends('frontend.layouts.master')
@section('main')
    {{--start sidebar+content--}}
    <div class="row margin-top">
        <div class="col-md-4">
            @include('frontend.partials.sidebar')
        </div>
        <div class="col-md-8">
            <div class="widget">
                <h3>Products in <span class="badge badge-info">{{$category->name}} Category</span></h3>
                @php
                    $products=$category->products()->paginate(9);
                @endphp

                @if($products->count() > 0)
                    @include('frontend.pages.category.partials.master_products')
                    @else
                        <div class="alert alert-warning">
                            No Products has added yet in this category |
                        </div>
                    @endif
                <div class="widget">

                </div>
            </div>
        </div>
    </div>
@stop
<script src="{{mix('js/app.js')}}"></script>

