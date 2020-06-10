<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
      <li <?php if (preg_match("/dash/i", $url)) { ?> class="active" <?php } ?>>
        <a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Calendar</span> <span class="label label-important">1</span></a>
        <ul <?php if (preg_match("/calendar/i", $url)) { ?> style="display: block;" <?php } ?>>            
          <li <?php if (preg_match("/events-calendar/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/events-calendar') }}">Events Calendar</a></li>          
        </ul>
      </li>  
    
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Events</span> <span class="label label-important">2</span></a>
        <ul <?php if (preg_match("/event/i", $url)) { ?> style="display: block;" <?php } ?>>
          <li <?php if (preg_match("/add-event/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/add-event') }}">Add Event</a></li>
          <li <?php if (preg_match("/view-events/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/view-events') }}">View Events</a></li>          
        </ul>
      </li>

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
        <ul <?php if (preg_match("/categor/i", $url)) { ?> style="display: block;" <?php } ?>>
          <li <?php if (preg_match("/add-category/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/add-category') }}">Add Category</a></li>
          <li <?php if (preg_match("/view-categories/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/view-categories') }}">View Categories</a></li>          
        </ul>
      </li>

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Cities</span> <span class="label label-important">2</span></a>
        <ul <?php if (preg_match("/cit/i", $url)) { ?> style="display: block;" <?php } ?>>
          <li <?php if (preg_match("/add-cit/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/add-city') }}">Add City</a></li>
          <li <?php if (preg_match("/view-cit/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/view-cities') }}">View Cities</a></li>          
        </ul>
      </li>

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Gallery</span> <span class="label label-important">2</span></a>
        <ul <?php if (preg_match("/galler/i", $url)) { ?> style="display: block;" <?php } ?>>
          <li <?php if (preg_match("/add-galler/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/add-gallery') }}">Add Gallery</a></li>
          <li <?php if (preg_match("/view-galler/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/view-galleries') }}">View Galleries</a></li>          
        </ul>
      </li>

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Banners</span> <span class="label label-important">2</span></a>
        <ul <?php if (preg_match("/banner/i", $url)) { ?> style="display: block;" <?php } ?>>
          <li <?php if (preg_match("/add-banner/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/add-banner') }}">Add Banner</a></li>
          <li <?php if (preg_match("/view-banners/i", $url)) { ?> class="active" <?php } ?>>
            <a href="{{ url('/admin/view-banners') }}">View Banners</a></li>          
        </ul>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Members</span> <span class="label label-important">1</span></a>
          <ul <?php if (preg_match("/user/i", $url)) { ?> style="display: block;" <?php } ?>>            
            <li <?php if (preg_match("/view-users/i", $url)) { ?> class="active" <?php } ?>>
              <a href="{{ url('/admin/view-users') }}">View Members</a></li>          
          </ul>

    </ul>
  </div>
  <!--sidebar-menu-->