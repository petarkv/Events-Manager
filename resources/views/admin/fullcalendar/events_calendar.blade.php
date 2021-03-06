@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
      <div id="breadcrumb"><a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/admin/calendar') }}" class="current">Events Calendar</a></div>
      <h1>Events Calendar</h1>
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box widget-calendar">
            <div class="widget-title"> <span class="icon"><i class="icon-calendar"></i></span>
              <h5>Calendar</h5>
              <div class="buttons"> <!--a id="add-event" data-toggle="modal" href="#modal-add-event" 
                  class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i--></a>
                <div class="modal hide" id="modal-add-event">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Add a new event</h3>
                  </div>
                  <div class="modal-body">
                    <p>Enter event name:</p>
                    <p>
                      <input id="event-name" type="text" /> 
                    </p>
                  </div>
                  <div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal">Cancel</a> <a href="#" id="add-event-submit" class="btn btn-primary">Add event</a> </div>
                </div>
              </div>
            </div>
            <!--div class="widget-content"-->
              <div id='wrap'>
                <div id="calendar" 
                data-route-admin-load-events-calendar="{{ route('routeAdminLoadEventsCalendar') }}"></div>
                <div style='clear:both'></div>
              <!--/div-->
              <!--div id="external-events" class="panel-right"-->
                <!--div class="panel-title">
                  <h5>Drag Events to the calander</h5>
                </div-->
                <!--div class="panel-content">
                  <div class="external-event ui-draggable label label-inverse">My Event 1</div>
                  <div class="external-event ui-draggable label label-inverse">My Event 2</div>
                  <div class="external-event ui-draggable label label-inverse">My Event 3</div>
                  <div class="external-event ui-draggable label label-inverse">My Event 4</div>
                  <div class="external-event ui-draggable label label-inverse">My Event 5</div>
                </div-->
              <!--/div-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection