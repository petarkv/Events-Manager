@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/admin/view-galleries') }}" class="current">View Galleries</a> </div>
      <h1>{{ $galleryDetails->gallery_name }}</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
              <h5>{{ $galleryDetails->gallery_name }} - {{ $galleryDetails->city }} - {{ $galleryDetails->location }} - {{ $galleryDetails->date }}</h5>
            </div>
            <div class="widget-content">
              <ul class="thumbnails">
                @foreach ($albumDetails as $album)
                  <li class="span2"> <a> <img src="{{ asset('images/backend_images/albums/medium/'.$album->image) }}" alt="" > </a>
                  <div class="actions"> <a title="" class="" href="{{ asset('images/backend_images/albums/medium/'.$album->image) }}">
                    <!--i class="icon-pencil"></i--></a> <a class="lightbox_trigger" href="{{ asset('images/backend_images/albums/large/'.$album->image) }}">
                      <i class="icon-search"></i></a> </div>
                </li> 
                @endforeach              
              </ul>

              <!--ul class="thumbnails">
                @foreach ($albumDetails as $album)
                <li class="span1"> <a> <img src="{{ asset('images/backend_images/albums/small/'.$album->image) }}" alt="" > </a>
                  <div class="actions"> <a title="" href="{{ asset('images/backend_images/albums/small/'.$album->image) }}">
                    <i class="icon-pencil"></i></a> 
                    <a class="lightbox_trigger" href="{{ asset('images/backend_images/albums/small/'.$album->image) }}">
                    <i class="icon-search"></i></a> 
                  </div>
                </li>
                @endforeach
              </ul-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection