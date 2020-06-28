@extends('layouts.frontLayout.front_design')
@section('content')
    
<section>
    <div class="container">
        <div class="row">

            @if (Session::has('flash_message_error'))                
            <div class="alert alert-error alert-block" style="background-color: #f2dfd0">
              <button type="button" class="close" data-dismiss="alert">×</button>                
              <strong>{!! session('flash_message_error') !!}</strong>                
            </div>
          @endif 
          
            <div class="col-sm-3">
                @include('layouts.frontLayout.front_sidebar')
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img style="width: 350px;" class="mainImage" src="{{ asset('images/backend_images/events/large/'.$eventDetails->image) }}" alt="" />
                            
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">                       
                                    <div class="item active thumbnails">
                                        <img style="width: 80px; cursor: pointer;" class="changeImage"
                                            src="{{ asset('images/backend_images/events/medium/'.$eventDetails->image) }}" alt=""> 
                                            
                                    @foreach ($eventAltImages as $altimage)                                    
                                    <img class="changeImage" style="width: 80px; cursor: pointer;" 
                                        src="{{ asset('images/backend_images/events/small/'.$altimage->image) }}" alt=""></a>
                                    @endforeach
 
                                    </div>                                    
                                </div>

                              <!-- Controls -->
                              <!--a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a-->
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <form name="addtocartForm" id="addtocartForm" action="{{ url('add-cart') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="event_id" value="{{ $eventDetails->event_id }}">
                            <input type="hidden" name="title" value="{{ $eventDetails->title }}">
                            <input type="hidden" name="event_city" value="{{ $eventDetails->city_name }}">
                            <input type="hidden" name="place_name" value="{{ $eventDetails->place_name }}">
                            <input type="hidden" name="price" id="price" value="{{ $eventDetails->ticket_price }}">
                        <div class="product-information"><!--/product-information-->                            
                            <h2>{{ $eventDetails->title }}</h2>               

                            <p>City Name: <b>{{ $eventDetails->city_name }}</b></p>                            
                            <p>Location: <b>{{ $eventDetails->place_name }}</b></p>
                            <p>Location Address: <b>{{ $eventDetails->place_address }}</b></p> 
                            <p>Start Event: <b>{{ $eventDetails->start_event }}</b></p>
                            <p>End Event: <b>{{ $eventDetails->end_event }}</b></p>                           
                            <p>Ticket Price: <b>{{ $eventDetails->ticket_price }} EUR</b></p>
                            <p>Web Address: <a href="http://{{ $eventDetails->www_address }}"> {{ $eventDetails->www_address }} </a></p><br>

                            <!--<img src="{{ asset('images/frontend_images/product-details/rating.png') }}" alt="" />-->

                            @if ($eventDetails->buy_tickets=="1")
                            <p><b style="font-size: 18px">Buy Tickets </b></p>
                            <p>
                                <select id="selType" name="type" style="width: 150px">
                                    <option value="">Select Ticket Type</option>
                                    @foreach ($tickets as $ticket)
                                        <option value="{{ $eventDetails->event_id }}*{{ $ticket->ticket_type }}*{{ $ticket->ticket_code }}">
                                            {{ $ticket->ticket_type }}</option>                                        
                                    @endforeach
                                </select>
                            </p>

                            <span>
                                <span id="getPrice">EUR {{ $eventDetails->ticket_price }}</span>
                                <label>Quantity:</label>
                                <input type="text" name="quantity" value="1" />
                                
                                @if ($total_stock>0)
                                <button type="submit" class="btn btn-fefault cart" id="cartButton">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button> 
                                @endif
   
                            </span> 
                            @endif

                            <p><b>Tickets Availability:</b> <span id="Availability"> @if($total_stock>0) In Stock @else Out of Stock @endif</span></p>
                            <!--a href=""><img src="{{ asset('images/frontend_images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a-->
                        </div><!--/product-information-->
                        </form>
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Event Details</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                            <li><a href="#tag" data-toggle="tab">Tickets</a></li>
                            <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
                            <div class="col-sm-12">
                                <p style="padding-left: 30px;">{{ $eventDetails->event_description }}</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="companyprofile" >
                            <p style="padding-left: 30px;">Who are We?</p>
                        </div>
                        
                        <div class="tab-pane fade" id="tag" >
                            @if ($total_stock>0)
                            <p style="padding-left: 30px;"><b>Buy Tickets On Our Site - <span>Available</span></b></p>
                            @else
                            <p style="padding-left: 30px;"><b>You can buy Tickets for "{{ $eventDetails->title }}" from our Partners 
                                <a href="http://www.onlinetickets.com">www.onlinetickets.com</a></b></p>                            
                            @endif
                        </div>
                        
                        <div class="tab-pane fade" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>
                                
                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended events</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $count=1; ?>
                            @foreach ($relatedEvents->chunk(3) as $chunk)
                        <div <?php if($count==1){ ?> class="item active" <?php } else{ ?>
                                                    class="item" <?php } ?>>
                                @foreach($chunk as $item)	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div style="border: solid 1px;" class="productinfo text-center">
                                                <img style="width: 230px;" src="{{ asset('images/backend_images/events/small/'.$item->image) }}" alt="" />
                                                <h2>{{ $item->title }}</h2>
                                                <p style="font-size: 18px;">{{ $item->place_name }}</p>
                                                <p>{{ $item->start_event }}</p>
                                                <a href="{{ url('/event/'.$item->event_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-plus"></i>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                                
                            </div>
                            <?php $count++; ?>  
                            @endforeach                            
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>

@endsection

@section('title')
    {{ $eventDetails->title }} 
@endsection