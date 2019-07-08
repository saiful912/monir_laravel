@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Add Products
                </div>
                <div class="card-body">
                    <form action="{{route('admin.product.create')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('backend.partials.message')
                        <div class="form-group">
                            <label for="exampleInputText">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputText">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Description</label>
                            <textarea class="form-control" rows="4" cols="40" name="description" id="exampleInputText"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Price</label>
                            <input type="number" class="form-control" name="price" id="exampleInputText">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="exampleInputText">
                        </div>
                        <div class="form-group">
                            <label for="productImage">Product Image</label>
                            <input type="file" class="form-control" name="product_image" id="productImage">
                        </div>
                        {{--multiple image from--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="productImage">Product Image</label>--}}

                            {{--<div class="row">--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<input type="file" class="form-control" name="product_image[]" id="productImage">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<input type="file" class="form-control" name="product_image[]" id="productImage">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<input type="file" class="form-control" name="product_image[]" id="productImage">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop