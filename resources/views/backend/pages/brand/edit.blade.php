@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Edit Brands
                </div>
                <div class="card-body">
                    @include('backend.partials.message')
                    <form action="{{route('admin.brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('backend.partials.message')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$brand->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Description</label>
                            <textarea class="form-control" rows="4" cols="40" name="description" id="exampleInputText">{{$brand->description}}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="old_image">Brand Old Image</label><br>
                            <img src="{!! asset('images/brands/'.$brand->image) !!}" width="100">
                        </div>

                        <div class="form-group">
                            <label for="new_image">Brand New Image</label>
                            <input type="file" class="form-control" name="image" id="new_image">
                        </div>

                        <button type="submit" class="btn btn-success">Update Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop