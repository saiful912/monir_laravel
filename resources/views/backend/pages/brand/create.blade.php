@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Add Brands
                </div>
                <div class="card-body">
                    <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
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
                            <label for="image">Brand Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Brands</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop