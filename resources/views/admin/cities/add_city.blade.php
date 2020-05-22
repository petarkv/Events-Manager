@extends('layouts.adminLayout.admin_design')
@section('content')
    
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="#">Cities</a> 
          <a href="#" class="current">Add City</a> </div>
      <h1>Cities</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add City</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/add-city') }}" 
                    name="add_city" id="add_city" novalidate="novalidate">{{ csrf_field() }}                  

                <div class="control-group">
                  <label class="control-label">City</label>
                  <div class="controls">
                    <input type="text" name="city_name" id="city_name">
                  </div>
                </div>                
                
                <div class="control-group">
                    <label class="control-label">State</label>
                    <div class="controls">
                      <input type="text" name="state" id="state">
                    </div>
                  </div>

                <!--div class="control-group">
                  <label class="control-label">Enable</label>
                  <div class="controls">
                    <input type="checkbox" name="status" id="status" value="1">
                  </div>
                </div-->

                <div class="form-actions">
                  <input type="submit" value="Add City" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>

@endsection