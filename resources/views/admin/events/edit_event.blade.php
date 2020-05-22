@extends('layouts.adminLayout.admin_design')
@section('content')
    
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="{{ url('/admin/view-events') }}">Events</a> 
          <a href="" class="current">Edit Event</a> </div>
      <h1>Events</h1>

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
              <h5>Add Event</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/edit-event/'.$eventDetails->event_id) }}" 
                    name="edit_event" id="edit_event" novalidate="novalidate"
                    enctype="multipart/form-data">{{ csrf_field() }}                    

                <div class="control-group" id="category">
                    <label class="control-label">Event Category</label>
                    <div class="controls">
                        <select name="category_id" id="category_id">
                            <?php echo $categories_dropdown; ?>                    
                        </select>
                    </div>
                </div>
                              
                <div class="control-group">
                    <label class="control-label">Event Title</label>
                    <div class="controls">
                      <input type="text" name="title" id="title" value="{{ $eventDetails->title }}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Event Description</label>
                    <div class="controls">
                      <textarea name="description" id="description">{{ $eventDetails->event_description }}</textarea>
                    </div>
                </div>

                <div class="control-group" id="category">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <select name="city_id" id="city_id">
                          <?php echo $cities_dropdown; ?>                    
                        </select>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Location Name</label>
                    <div class="controls">
                      <input type="text" name="location_name" id="location_name" value="{{ $eventDetails->place_name }}">
                    </div>
                </div> 
                
                <div class="control-group">
                    <label class="control-label">Location Address</label>
                    <div class="controls">
                      <input type="text" name="location_address" id="location_address" value="{{ $eventDetails->place_address }}">
                    </div>
                </div> 
                
                <div class="control-group">
                    <label class="control-label">Starts at:</label>
                    <div class="controls">
                      <input type="datetime-local" name="starts_at" id="starts_at" value="{{ $eventDetails->start_event }}">
                    </div>
                </div> 

                <div class="control-group">
                    <label class="control-label">Ends at:</label>
                    <div class="controls">
                      <input type="datetime-local" name="ends_at" id="ends_at" value="{{ $eventDetails->end_event }}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="text" name="price" id="price" value="{{ $eventDetails->ticket_price }}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Web Address</label>
                    <div class="controls">
                      <input type="text" name="web_address" id="web_address" value="{{ $eventDetails->www_address }}">
                    </div>
                </div>

                <!--div class="control-group">
                    <label class="control-label">Longitude</label>
                    <div class="controls">
                      <input type="text" name="longitude" id="longitude">
                    </div>
                </div-->

                <!--div class="control-group">
                    <label class="control-label">Latitude</label>
                    <div class="controls">
                      <input type="text" name="latitude" id="latitude">
                    </div>
                </div-->

                <div class="control-group">
                    <label class="control-label">Image</label>
                    <div class="controls">
                      <input type="file" name="image" id="image"><br>
                      <input type="hidden" name="current_image" value="{{ $eventDetails->image }}">
                      @if(!empty($eventDetails->image))
                      <img style="width: 50px; height: 50px" 
                      src="{{ asset('/images/backend_images/events/small/'.$eventDetails->image) }}">
                       | <a href="{{ url('/admin/delete-event-image/'.$eventDetails->event_id) }}">Delete</a>
                      @endif
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Enable</label>
                    <div class="controls">
                      <input type="checkbox" name="status" id="status" @if($eventDetails->is_active==1) checked @endif
                      value="1">
                    </div>
                  </div>

                <div class="control-group">
                  <label class="control-label"> Buy Tickets Available</label>
                  <div class="controls">
                    <input type="checkbox" name="buy_tickets" id="buy_tickets" @if($eventDetails->buy_tickets==1) checked @endif
                     value="1">
                  </div>
                </div>
                
                <div class="form-actions">
                  <input type="submit" value="Edit Event" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>

@endsection