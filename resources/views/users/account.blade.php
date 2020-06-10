@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top: 10px;"><!--form-->
    <div class="container">
        <div class="row">

    @if (Session::has('flash_message_error'))                
      <div class="alert alert-error alert-block" style="background-color: #f2dfd0;">
        <button type="button" class="close" data-dismiss="alert">×</button>                
        <strong>{!! session('flash_message_error') !!}</strong>                
      </div>
    @endif 
          
    @if (Session::has('flash_message_success'))                
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>                
        <strong>{!! session('flash_message_success') !!}</strong>                
      </div>
    @endif

            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h2>Update Account</h2>
                    <form id="accountForm" name="accountForm" action="{{ url('/account') }}" method="POST">
                        {{ csrf_field() }}
                        <input value="{{ $userDetails->first_name }}" id="name" name="name" type="text" placeholder="Name"/>
                        <input value="{{ $userDetails->last_name }}" id="surname" name="surname" type="text" placeholder="Surname"/>
                        <!--input value="{{ $userDetails->username }}" id="username" name="username" type="text" placeholder="Username" readonly/-->
                        <input value="{{ $userDetails->address }}" id="address" name="address" type="text" placeholder="Address"/>
                        <input value="{{ $userDetails->city }}" id="city" name="city" type="text" placeholder="City"/>                        
                        <select style=" height: 40px;" id="country" name="country">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country)
                                     selected @endif>{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        <input value="{{ $userDetails->postal_code }}" style="margin-top: 10px;" id="postalcode" name="postalcode" type="text" placeholder="Postal Code"/>
                        <input value="{{ $userDetails->mobile }}" id="mobile" name="mobile" type="text" placeholder="Mobile"/>
                        <input type="file" id="avatar" name="avatar"/>
                        @if(!empty($userDetails->user_avatar))
                            <img style="width: 50px; height: 50px" 
                            src="{{ asset('/images/backend_images/avatars/small/'.$userDetails->user_avatar) }}">
                            @if($userDetails->user_avatar != 'user.jpg')
                               |    <a href="{{ url('/admin/delete-user-avatar/'.$userDetails->id) }}">Delete</a>
                            @endif
                      @endif
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>                    
                </div>
            </div>
            
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>

            <div class="col-sm-4">
                <div class="signup-form">
                    <h2>Update Password</h2> 
                    
                    <form id="passwordForm" name="passwordForm" action="{{ url('/update-user-password') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="password" name="current_password" id="current_password" placeholder="Current Password">
                        <span id="chkPwd"></span>
                        <input type="password" name="new_password" id="new_password" placeholder="New Password">
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                        <button type="submit" class="btn btn-default">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section><!--/form-->

@endsection

@section('title')
Account
@endsection