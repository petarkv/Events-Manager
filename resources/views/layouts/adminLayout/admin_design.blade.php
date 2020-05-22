<!DOCTYPE html>
<html lang="en">
<head>
<title>Events</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
<!-- Upload Image -->
<link rel="stylesheet" href="{{ asset('css/backend_css/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}" />
<!-- Upload Image End -->

<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}" />
<link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<!-- Full Calendar Matrix-->
<link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}" />

<link href='{{ asset('assets/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
<link href='{{ asset('assets/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
<link href='{{ asset('assets/fullcalendar/packages/timegrid/main.css') }}' rel='stylesheet' />
<link href='{{ asset('assets/fullcalendar/packages/list/main.css') }}' rel='stylesheet' />
<!--link href='{{ asset('assets/fullcalendar/css/style.css') }}' rel='stylesheet' /-->

<!-- Number of entries in table -->
<link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}" />

<!-- Sweet Alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

<!-- DateTime Picker -->
<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.datetimepicker.css') }}" />

</head>
<body>


@include('layouts.adminLayout.admin_header')

@include('layouts.adminLayout.admin_sidebar')

@yield('content')

@include('layouts.adminLayout.admin_footer')

<!--
<script src="{{ asset('js/backend_js/excanvas.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/fullcalendar.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.dashboard.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.interface.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.chat.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.wizard.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/backend_js/select2.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>-->

<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/backend_js/select2.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>

<!-- Full Calendar Matrix -->
<!--script src="{{ asset('js/backend_js/fullcalendar.min.js') }}"></script-->
<!--script src="{{ asset('js/backend_js/matrix.calendar.js') }}"></script--> 
<script src='{{ asset('assets/fullcalendar/packages/core/main.js') }}'></script>
  <script src='{{ asset('assets/fullcalendar/packages/interaction/main.js') }}'></script>
  <script src='{{ asset('assets/fullcalendar/packages/daygrid/main.js') }}'></script>
  <script src='{{ asset('assets/fullcalendar/packages/timegrid/main.js') }}'></script>
  <script src='{{ asset('assets/fullcalendar/packages/list/main.js') }}'></script>
  
  <script src='{{ asset('assets/fullcalendar/packages/core/locales-all.js') }}'></script>
  
  <script src='{{ asset('assets/fullcalendar/js/script.js') }}'></script>

  <script src='{{ asset('assets/fullcalendar/js/calendar.js') }}'></script>


<!-- Pop Up Window -->
<script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script>

<!-- Table -->
<script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>

<!-- Sweet Alert -->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script--> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- DateTime Picker -->
<!--script src="{{ asset('js/backend_js/jquery.js') }}"></script-->
<script src="{{ asset('js/backend_js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
  jQuery('#starts_at').datetimepicker({
    minDate: 0,
    format:'y-m-d H:m'     
  });
</script>
<script>
  jQuery('#ends_at').datetimepicker({
    minDate: 0,
    format:'y-m-d H:m'    
  });
</script>

</body>
</html>
