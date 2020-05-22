@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="{{ url('/admin/view-events') }}">Event's Images</a> 
          <a href="" class="current">Add Event Images</a> </div>
      <h1>Event's Images</h1>

    @if (Session::has('flash_message_error'))                
      <div class="alert alert-error alert-block">
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

    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Event Images</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" 
                    action="{{ url('/admin/add-images/'.$eventDetails->event_id) }}" 
                    name="add_images" id="add_images" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    
                <input type="hidden" name="event_id" value="{{ $eventDetails->event_id }}">
             
                <div class="control-group">
                  <label class="control-label">Event Name</label>
                  <label class="control-label"><strong>{{ $eventDetails->title }}</strong></label>
                </div>
                
                <div class="control-group">
                    <label class="control-label">City</label>
                    <label class="control-label"><strong>{{ $eventDetails->city_name }}</strong></label>
                </div>

                <div class="control-group">
                  <label class="control-label">Location</label>
                  <label class="control-label"><strong>{{ $eventDetails->place_name }}</strong></label>
              </div>

                <div class="control-group">
                    <label class="control-label">Alternate Image(s)</label>
                    <div class="controls">
                      <input type="file" name="image[]" id="image" multiple required>
                    </div>
                </div>
 
                <div class="form-actions">
                  <input type="submit" value="Add Image" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>View Attributes</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Image ID</th>
                    <th>Event ID</th>
                    <th>Image</th>                                      
                    <th>Actions</th>
                  </tr>

                </thead>
                <tbody>
                  @foreach ($eventsImages as $image)
                      <tr>
                        <td>{{ $image->image_id }}</td>
                        <td>{{ $image->event_id }}</td>
                        <td><img src="{{ asset('images/backend_images/events/small/'.$image->image) }}"
                          style="width: 60px; height: 60px;"></td>
                        <td><a rel="{{ $image->image_id }}" rel1="delete-alt-image" 
                          href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Delete Event Image">Delete</a></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection