@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
          <i class="icon-home"></i> Home</a> <a href="{{ url('/admin/view-tickets') }}">Events's Tickets</a> 
          <a href="" class="current">Add Event Tickets</a> </div>
      <h1>Events's Tickets</h1>

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
              <h5>Add Events's Tickets</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" 
                    action="{{ url('/admin/add-tickets/'.$eventDetails->event_id) }}" 
                    name="add_tickets" id="add_tickets">
                    {{ csrf_field() }} 
                    
                <input type="hidden" name="event_id" value="{{ $eventDetails->event_id }}">
             
                <div class="control-group">
                  <label class="control-label">Event Name</label>
                  <label class="control-label"><strong>{{ $eventDetails->title }}</strong></label>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Place Name</label>
                    <label class="control-label"><strong>{{ $eventDetails->place_name }}</strong></label>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Place Address</label>
                    <label class="control-label"><strong>{{ $eventDetails->place_address }}</strong></label>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Ticket Price</label>
                    <label class="control-label"><strong>{{ $eventDetails->ticket_price }}</strong></label>
                </div>
                
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="field_wrapper">
                        <div>
                            <input type="text" name="code[]" id="code" placeholder="Ticket Code" style="width: 120px;" required/>
                            <input type="text" name="type[]" id="type" placeholder="Type" style="width: 120px;" required/>
                            <input type="text" name="price[]" id="price" placeholder="Price" style="width: 120px;" required/>
                            <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px;" required/>
                            <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                        </div>
                    </div>
                </div> 
               
                <div class="form-actions">
                  <input type="submit" value="Add Tickets" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="container-fluid">
        <hr>
        <div class="row-fluid">
          <div class="span12">
  
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>View Tickets</h5>
              </div>
              <div class="widget-content nopadding">
                <form action="{{ url('/admin/edit-tickets/'.$eventDetails->event_id) }}" method="POST">
                  {{ csrf_field() }}
                <table class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th>Ticket ID</th>                      
                      <th>Ticket Code</th>
                      <th>Ticket Type</th>
                      <th>Price</th>
                      <th>Stock</th>                      
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
  
                      @foreach ($tickets as $ticket)
                      <tr class="gradeX">
                          <td><input type="hidden" name="idTicket[]" value="{{ $ticket->id }}">{{ $ticket->id }}</td>                          
                          <td>{{ $ticket->ticket_code }}</td>
                          <td>{{ $ticket->ticket_type }}</td>
                          <td><input type="text" name="price[]" value="{{ $ticket->price }}"></td>
                          <td><input type="text" name="stock[]" value="{{ $ticket->stock }}"></td>
                          
                          <td class="center">                              
                            <input type="submit" value="Update" class="btn btn-primary btn-mini">                         
                                                                         
                            <a rel="{{ $ticket->id }}" rel1="delete-ticket" 
                              href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Delete Ticket">Delete</a></td>
                          </tr>                     
 
                      @endforeach
                                              
                  </tbody>
                </table>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection