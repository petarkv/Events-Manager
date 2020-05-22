@extends('layouts.adminLayout.admin_design')
@section('content')
    
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="{{ url('admin/view-galleries') }}">Galleries</a> 
          <a href="#" class="current">Edit Gallery</a> </div>
      <h1>Galleries</h1>

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
              <h5>Edit Gallery</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/edit-gallery/'.$galleryDetails->gallery_id) }}" 
                    name="edit_gallery" id="edit_gallery" novalidate="novalidate">{{ csrf_field() }}                  

                <div class="control-group">
                  <label class="control-label">Gallery Name</label>
                  <div class="controls">
                    <input type="text" name="gallery_name" id="gallery_name" value="{{ $galleryDetails->gallery_name }}">
                  </div>
                </div>                
                
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                      <input type="text" name="city" id="city" value="{{ $galleryDetails->city }}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Location</label>
                    <div class="controls">
                      <input type="text" name="location" id="location" value="{{ $galleryDetails->location }}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Event Date</label>
                    <div class="controls">
                      <input type="date" name="event_date" id="event_date" value="{{ $galleryDetails->date }}">
                    </div>
                </div>

                <!--div class="control-group">
                  <label class="control-label">Enable</label>
                  <div class="controls">
                    <input type="checkbox" name="status" id="status" value="1">
                  </div>
                </div-->

                <div class="form-actions">
                  <input type="submit" value="Edit Gallery" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>

@endsection