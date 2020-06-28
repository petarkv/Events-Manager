@extends('layouts.frontLayout.front_design')
@section('content')
    
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>

        @if (Session::has('flash_message_error'))                
            <div class="alert alert-error alert-block" style="background-color: #f2dfd0">
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

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_amount = 0;?>
                    @foreach ($userCart as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img style="width: 130px;" src="{{ asset('images/backend_images/events/small/'.$cart->image) }}" 
                                alt=""></a>
                        </td>
                        <td class="cart_description">                            
                            <h4><a href=""><strong>{{ $cart->title }}</strong></a></h4><br>
                            <p><strong>Location:</strong> {{ $cart->name }} / {{ $cart->place_name }}</p>
                            <p><strong>Ticket Code:</strong> {{ $cart->ticket_code }}</p>
                            <p><strong>Ticket Type:</strong> {{ $cart->ticket_type }}</p>
                        </td>
                        <td class="cart_price">
                            <p>EUR {{ $cart->price }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" 
                                        autocomplete="off" size="2">
                                @if ($cart->quantity>1)
                                    <a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
                                @endif
                                
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">EUR {{ $cart->price*$cart->quantity }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ url('/cart/delete-ticket/'.$cart->id) }}" style="border: solid 1px black;">
                                <i class="fa fa-times"></i></a>
                        </td>
                    </tr> 
                    <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                    @endforeach
          
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <!--div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a Coupon code you want to use.</p>
        </div-->
        <div class="row">
            <!--div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <label>Coupon Code</label>
                            <form action="{{ url('cart/apply-coupon') }}" method="POST">
                                {{ csrf_field() }}
                            <input type="text" name="coupon_code">
                            <input type="submit" value="Apply" class="btn btn-default">
                            </form>
                        </li>                        
                    </ul>                    
                    
                </div>
            </div-->
            <div class="col-sm-6" style="margin-left: 585px;">
                <div class="total_area">
                    <ul> 
                        <li>Total <span>EUR <?php echo $total_amount; ?></span></li>                       
                    </ul>
                        <a class="btn btn-default update" href="{{ url('/') }}">Update</a>
                        <a class="btn btn-default check_out" href="{{ url('/checkout') }}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection

@section('title')
    Cart
@endsection