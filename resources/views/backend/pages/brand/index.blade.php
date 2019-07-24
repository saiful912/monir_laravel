@extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage Brands
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="table_data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                       <tbody>
                       @foreach($brands as $brand)
                           <tr>
                               <td>#</td>
                               <td>{{$brand['name']}}</td>
                               <td>
                                   <img src="{!! asset('images/brands/'.$brand->image) !!}" width="160">
                               </td>
                               <td>
                                   <a href="{{route('admin.brands.edit',$brand->id)}}" class="btn btn-success">Edit</a>
                                   <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                   <!-- Modal -->
                                   <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">Are you sure to
                                                       delete!</h5>
                                                   <button type="button" class="close" data-dismiss="modal"
                                                           aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div class="modal-body">
                                                   <form action="{!! route('admin.brand.delete',$brand->id) !!}"
                                                         method="post">
                                                       {{csrf_field()}}
                                                       <button type="submit" class="btn btn-danger">Permanent Delete
                                                       </button>
                                                   </form>
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">Cancel
                                                   </button>

                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </td>
                           </tr>
                       @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop