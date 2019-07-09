@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Add Division
                </div>
                <div class="card-body">
                    <form action="{{route('admin.division.store')}}" method="post" enctype="multipart/form-data">
                       @csrf
                        @include('backend.partials.message')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="text" class="form-control" name="priority" id="priority">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Division</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop