<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        
        <div class="panel panel-default">

            @foreach ($categories as $category)
            @if($category->status==1)
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{ asset('/events/'.$category->url) }}" style="font-size: 18px;">{{ $category->name }}</a></h4>
                </div>
            @endif
            @endforeach
            
        </div>
  
    </div><!--/category-products-->

    <!--div class="price-range"--><!--price-range-->
        <!--h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div--><!--/price-range-->
    
    <div class="shipping text-center"><!--shipping-->
        <a href=""><img src="{{ asset('images/frontend_images/tickets_buy.png') }}" alt=""/></a>        
    </div><!--/shipping-->
    <div class="shipping text-center"><!--shipping-->
        <a href=""><img src="{{ asset('images/frontend_images/tickets_buy.png') }}" alt=""/></a>        
    </div><br><!--/shipping-->

</div>