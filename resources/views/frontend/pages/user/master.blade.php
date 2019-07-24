@extends('frontend.layouts.master')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="" class="list-group-item">
                        {{--gravatarHelper ImageHelper--}}
                        {{--<img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="img rounded-circle" width="100px">--}}
                        <h6 class="mt-2 ml-2">{{$user->first_name.' '.$user->last_name}}</h6>
                    </a>
                    <a href="{{route('user.dashboard')}}" class="list-group-item {{Route::is('user.dashboard') ? 'active' : ''}}">Dashboard</a>
                    <a href="{{route('user.profile')}}" class="list-group-item {{Route::is('user.profile') ? 'active' : ''}}">Update Profile</a>

                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-body">
                    @yield('sub-content')
                </div>

            </div>
        </div>
    </div>
    @stop