@extends('layouts.frontLayout.front_design')
@section('content')
    
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Orders</li>
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
                        <th>Order ID</th>
                        <th>Ordered Tickets</th>
                        <th>Payment Method</th>
                        <th>Grand Total</th>
                        <th>Created on</th>
                        <th>Actions</th>                     
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @foreach($order->orders as $ticket)
                            <a href="{{ url('/tickets-orders/'.$order->id) }}"> {{ $ticket->ticket_code }}</a><br>
                            @endforeach
                        </td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->grand_total }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a rel="{{ $order->order_id }}" rel1="delete-tickets-orders" href="javascript:" 
                            class="btn btn-danger btn-mini deleteRecord" title="Delete Tickets Orders">Delete</a>
                        </td>                     
                    </tr>
                    @endforeach                  
                </tbody>
                <tfoot>
                    <tr>
                        <th>Order ID</th>
                        <th>Ordered Tickets</th>
                        <th>Payment Method</th>
                        <th>Grand Total</th>
                        <th>Created on</th> 
                        <th>Actions</th>                      
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>    
</section>

@endsection

@section('title')
Tickets Orders
@endsection