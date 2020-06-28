@extends('layouts.frontLayout.front_design')
@section('content')
<?php use App\Order; ?>   
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
            <h3>YOUR ORDER HAS BEEN PLACED</h3>
            <p>Your order number is <strong style="color: red;">{{ Session::get('order_id') }}</strong> and total payable about is
                EUR <strong style="color: red;">{{ Session::get('grand_total') }}</strong></p>
            <p>Please make payment by clicking on below Payment Button</p><br>

            <?php 
            $orderDetails = Order::getOrderTicketsDetails(Session::get('order_id'));
            $orderDetails = json_decode(json_encode($orderDetails)); 
            //echo "<pre>"; print_r($orderDetails); die;
            $getCountryCode = Order::getCountryCode($orderDetails->country);
            ?>

            <!-- PAYPAL BUTTON -->       
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                <!--Saved buttons use the "secure click" command-->       
                <input type="hidden" name="cmd" value="_xclick">
                           
                <!-- Saved buttons are identified by their button IDs -->               
                <input type="hidden" name="business" value="sb-bb6ut1954607@business.example.com">
                <input type="hidden" name="item_name" value="{{ Session::get('order_id') }}"> 
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="amount" value="{{ round(Session::get('grand_total'),2) }}">

                <input type="hidden" name="first_name" value="{{ $orderDetails->first_name }}">
                <input type="hidden" name="last_name" value="{{ $orderDetails->last_name }}">
                <input type="hidden" name="address1" value="{{ $orderDetails->address }}">
                <input type="hidden" name="address2" value="">
                <input type="hidden" name="city" value="{{ $orderDetails->city }}">
                <input type="hidden" name="state" value="">
                <input type="hidden" name="zip" value="{{ $orderDetails->postal_code }}">             
                <input type="hidden" name="email" value="{{ $orderDetails->user_email }}">
                <input type="hidden" name="country" value="{{ $getCountryCode->country }}">
                <input type="hidden" name="return" value="{{ url('/paypal/thanks') }}">                             
                <input type="hidden" name="cancel_return" value="{{ url('/paypal/cancel') }}"> 

                <!--Saved buttons display an appropriate button image. -->
                <input type="image"
                 src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Pay Now">
                <img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                           
             </form>
            <!-- END PAYPAL BUTTON -->

        </div>
    </div>
</section>

@endsection

@section('title')
PayPal
@endsection

<?php
//Session::forget('grand_total');
//Session::forget('order_id');
//Session::forget('payment_method');
?>