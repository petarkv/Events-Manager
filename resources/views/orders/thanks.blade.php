@extends('layouts.frontLayout.front_design')
@section('content')
    
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Thanks</li>
            </ol>
        </div>               
    </div>
</section>

<section id="do_action">
    <div class="container">
        <div class="heading" align="center">
            <h3>YOUR <strong style="color: red;">COD</strong> ORDER HAS BEEN PLACED</h3>
            <p>Your order number is <strong style="color: red;">{{ Session::get('order_id') }}</strong> and total payable about is
                 EUR <strong style="color: red;">{{ Session::get('grand_total') }}</strong></p>
        </div>
    </div>
</section>

@endsection

@section('title')
Thanks
@endsection

<?php
Session::forget('grand_total');
Session::forget('order_id');
//Session::forget('payment_method');
?>