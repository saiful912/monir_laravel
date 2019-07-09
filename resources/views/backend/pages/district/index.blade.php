  @extends('backend.layouts.master')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage District
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>#</th>
                            <th>District Name</th>
                            <th>Division Name</th>
                            <th>Action</th>
                        </tr>

                        @foreach($districts as $district)
                            <tr>
                                <td>#</td>
                                <td>{{$district->name}}</td>
                                <td>{{$district->division->name}}</td>

                                <td>
                                    <a href="{{route('admin.districts.edit',$district->id)}}" class="btn btn-success">Edit</a>
                                    <a href="#deleteModal{{$district->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{$district->id}}" tabindex="-1"
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
                                                    <form action="{!! route('admin.district.delete',$district->id) !!}"
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop