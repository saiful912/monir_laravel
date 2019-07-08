@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Add Categories
                </div>
                <div class="card-body">
                    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                       @csrf
                        @include('backend.partials.message')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Description</label>
                            <textarea class="form-control" rows="4" cols="40" name="description" id="exampleInputText"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Parent Category (optional)</label>
                            <select class="form-control" name="parent_id">
                                <option value="">Please select a parent category</option>
                                @foreach($main_categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Category Image</label>
                            <input type="file" class="form-control" name="image" id="image">
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
                        <button type="submit" class="btn btn-primary">Add Categories</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop