@extends('layouts.frontLayout.front_design')
@section('content')
    
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="{{ url('/tickets-orders') }}">Tickets Orders</a></li>
              <li class="active">{{ $orderDetails->id }}</li>
            </ol>
        </div>               
    </div>
</section>

<section id="do_action">
    <div class="container">
        <div class="heading" align="center">
            
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Ticket Code</th>
                        <th>Event Name</th>
                        <th>Event Location</th>
                        <th>Event City</th>
                        <th>Ticket Type</th>
                        <th>Ticket Price</th>
                        <th>Ticket Quantity</th>                                                             
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails->orders as $ticket)
                    <tr>
                        <td>{{ $ticket->ticket_code }}</td>
                        <td>{{ $ticket->event_name }}</td>
                        <td>{{ $ticket->event_location }}</td>
                        <td>{{ $ticket->event_city }}</td>
                        <td>{{ $ticket->ticket_type }}</td>
                        <td>{{ $ticket->ticket_price }}</td>
                        <td>{{ $ticket->ticket_quantity }}</td>                                            
                    </tr>
                    @endforeach                  
                </tbody>
                
            </table>
        </div>
    </div>    
</section>

@endsection

@section('title')
Tickets Orders
@endsection