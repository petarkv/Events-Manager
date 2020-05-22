@extends('layouts.adminLayout.admin_design')
@section('content')
    
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="{{ url('/admin/view-banners') }}">Banners</a> 
          <a href="" class="current">Add Banner</a> </div>
      <h1>Banners</h1>

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
              <h5>Add Banner</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/add-banner') }}" 
                    name="add_banner" id="add_banner" novalidate="novalidate"
                    enctype="multipart/form-data">{{ csrf_field() }}                    

                <div class="control-group">
                    <label class="control-label">Banner Image</label>
                    <div class="controls">
                        <input type="file" name="banner_image" id="banner_image" required>
                    </div>
                </div>    

                <div class="control-group">
                  <label class="control-label">Banner Title</label>
                  <div class="controls">
                    <input type="text" name="title" id="title" required>
                  </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Link</label>
                    <div class="controls">
                      <input type="text" name="link" id="link" required>
                    </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label">Enable</label>
                  <div class="controls">
                    <input type="checkbox" name="status" id="status" value="1">
                  </div>
                </div>
                
                <div class="form-actions">
                  <input type="submit" value="Add Banner" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>

@endsection