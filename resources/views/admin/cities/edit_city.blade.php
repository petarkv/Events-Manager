@extends('layouts.adminLayout.admin_design')
@section('content')
    
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="#">Cities</a> 
          <a href="#" class="current">Edit City</a> </div>
      <h1>Cities</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Edit City</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/edit-city/'.$cityDetails->city_id) }}" 
                    name="edit_city" id="edit_city" novalidate="novalidate">{{ csrf_field() }}

                <div class="control-group">
                  <label class="control-label">City</label>
                  <div class="controls">
                    <input type="text" name="city_name" id="city_name" value="{{ $cityDetails->name }}">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">State</label>
                  <div class="controls">
                    <input type="text" name="state" id="state" value="{{ $cityDetails->state }}">
                  </div>
                </div>

                <!--div class="control-group">
                  <label class="control-label">Enable</label>
                  <div class="controls">
                    <input type="checkbox" name="status" id="status" @if($cityDetails->status==1) checked @endif
                    value="1">
                  </div>
                </div-->

                <div class="form-actions">
                  <input type="submit" value="Edit City" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
</div>

@endsection