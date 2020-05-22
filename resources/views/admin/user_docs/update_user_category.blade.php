@extends('layouts.adminLayout.admin_design')
@section('content')
    
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="{{ url('/admin/view-users') }}">View Users</a> 
          <a href="#" class="current">Update User</a> </div>
      <h1>Users</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Update User</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/update-user/'.$userDetails->id) }}" 
                    name="update_user" id="update_user" novalidate="novalidate">{{ csrf_field() }}

                <div class="control-group">
                    <img src="{{ asset('/images/backend_images/avatars/small/'.$userDetails->user_avatar) }}" 
                            style="width: 80px; height: 80px;">    
                </div>

                <div class="control-group">
                  <label class="control-label">User ID</label>
                  <label class="control-label"><strong>{{ $userDetails->id }}</strong></label>     
                </div>

                <div class="control-group">
                    <label class="control-label">First Name</label>
                    <label class="control-label"><strong>{{ $userDetails->first_name }}</strong></label>     
                </div>

                <div class="control-group">
                    <label class="control-label">Last Name</label>
                    <label class="control-label"><strong>{{ $userDetails->last_name }}</strong></label>     
                </div>
                  
                <div class="control-group">
                    <label class="control-label">Username</label>
                    <label class="control-label"><strong>{{ $userDetails->username }}</strong></label>     
                </div>

                <div class="control-group">
                    <label class="control-label">E-mail</label>
                    <label class="control-label"><strong>{{ $userDetails->email }}</strong></label>     
                </div>

                <div class="control-group">
                    <label class="control-label">User Category</label>
                    <label class="control-label"><strong>{{ $userDetails->user_category }}</strong></label>     
                </div>

                <div class="control-group" style="width: 400px;">
                    <label class="control-label">Update User Category</label>
                    <div class="controls">
                        <select name="user_category" id="user_category">
                            <option selected disabled>---- Update User ----</option>
                            <option value="event_manager">Event Manager</option>
                            <option value="admin">Admin</option>
                        </select>    
                    </div>     
                </div>
                
      
                

                <!--div class="control-group">
                  <label class="control-label">Enable</label>
                  <div class="controls">
                    <input type="checkbox" name="status" id="status" @if($userDetails->id) checked @endif
                    value="1">
                  </div>
                </div-->

                <div class="form-actions">
                  <input type="submit" value="Update User" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
</div>

@endsection