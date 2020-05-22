@extends('layouts.adminLayout.admin_design')
@section('content')
    
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url("/admin/dashboard") }}" title="Go to Home" class="tip-bottom">
            <i class="icon-home"></i> Home</a> <a href="#">Events</a> 
            <a href="#" class="current">View Events</a> </div>
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
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>View Events</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Event ID</th>
                    <!--<th>Category ID</th>-->
                    <th>Category Name</th>
                    <th>Event Name</th>
                    <th>City</th>
                    <th>Location</th>
                    <th>Date</th>                    
                    <th>Image</th>
                    <th>Status</th>
                    <th>Buy Tickets</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($events as $event)
                    <tr class="gradeX">
                        <td>{{ $event->event_id }}</td>
                        <!--<td>{{ $event->category_id }}</td>-->
                        <td>{{ $event->category_name }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->city_name }}</td>
                        <td>{{ $event->place_name }}</td>
                        <td>{{ $event->start_event }}</td>                        
                        <td>
                            @if (!empty($event->image))
                            <img src="{{ asset('/images/backend_images/events/small/'.$event->image) }}" 
                            style="width: 60px; height: 60px;">  
                            @endif                            
                        </td>
                        <td>@if ($event->is_active==1)
                            Anabled
                            @else Disabled
                        @endif</td>
                        <td>@if ($event->buy_tickets==1)
                            Yes
                            @else No
                        @endif</td>
                        <td class="center">
                            <a href="#myModal{{ $event->event_id }}" data-toggle="modal" 
                                class="btn btn-success btn-mini" title="View Events">View</a>
                            <a href="{{ url('/admin/edit-event/'.$event->event_id) }}" 
                                class="btn btn-primary btn-mini" title="Edit Event">Edit</a>
                            <!--a href="{{ url('/admin/add-attributes/'.$event->event_id) }}" 
                              class="btn btn-success btn-mini" title="Add Attributes">Add</a--> 
                            <a href="{{ url('/admin/add-images/'.$event->event_id) }}" 
                              class="btn btn-info btn-mini" title="Add Image">Add Img</a>
                            <a href="{{ url('/admin/add-tickets/'.$event->event_id) }}" 
                              class="btn btn-success btn-mini" title="Add Tickets">Tickets</a>                                              
                            <a rel="{{ $event->event_id }}" rel1="delete-event" 
                              href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Delete Event">Delete</a></td>
                        </tr>                      
                      
                        <div id="myModal{{ $event->event_id }}" class="modal hide">
                          <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3>{{ $event->event_name }} Full Details</h3>
                          </div>
                          <div class="modal-body">
                            <p>Event ID: {{ $event->id }}</p>
                            <p>Event Name: {{ $event->title }}</p>
                            <p>Event Description: {{ $event->event_description }}</p>
                            <p>Category ID: {{ $event->category_id }}</p> 
                            <p>Category Name: {{ $event->category_name }}</p>
                            <p>City ID: {{ $event->city_id }}</p>
                            <p>City Name: {{ $event->city_name }}</p>                            
                            <p>Location: {{ $event->place_name }}</p>
                            <p>Location Address: {{ $event->place_address }}</p> 
                            <p>Start Event: {{ $event->start_event }}</p>
                            <p>End Event: {{ $event->end_event }}</p>                           
                            <p>Ticket Price: {{ $event->ticket_price }} EUR</p>
                            <p>Web Address: {{ $event->www_address }}</p>
                          </div>
                        </div>                        

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