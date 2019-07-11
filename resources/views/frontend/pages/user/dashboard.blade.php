@extends('frontend.pages.user.master')
@section('sub-content')
    <div class="container margin-top-20">
        <h4 class="text-center mt-2 font-weight-bold">Welcome {{$user->first_name.' '.$user->last_name}}</h4>
        <p class="text-center">You can change your profile and every informations here..</p>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card-body pointer mt-2" onclick="location.href='{{route('user.profile')}}'">
                <h6>Update profile</h6>
            </div>
        </div>
    </div>
    @stop

<script src="{{mix('js/app.js')}}"></script>
