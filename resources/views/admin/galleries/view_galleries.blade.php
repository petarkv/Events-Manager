@extends('layouts.adminLayout.admin_design')
@section('content')
    
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url("/admin/dashboard") }}" title="Go to Home" class="tip-bottom">
            <i class="icon-home"></i> Home</a> <a href="#">Galleries</a> 
            <a href="#" class="current">View Galleries</a> </div>
      <h1>Galleries</h1>

    @if (Session::has('flash_message_error'))                
      <div class="alert alert-error alert-block">
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

    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>View Galleries</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Gallery ID</th>
                    <th>User ID</th>
                    <th>Gallery Name</th>
                    <th>City</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($galleries as $gallery)
                    <tr class="gradeX">
                        <td>{{ $gallery->gallery_id }}</td>
                        <td>{{ $gallery->id }}</td>
                        <td>{{ $gallery->gallery_name }}</td>
                        <td>{{ $gallery->city }}</td>
                        <td>{{ $gallery->location }}</td>
                        <td>{{ $gallery->date }}</td>
                        <td class="center">
                          <a href="{{ url('/admin/view-album/'.$gallery->gallery_id) }}" 
                            class="btn btn-success btn-mini" title="View Album">View</a> 
                          <a href="{{ url('/admin/edit-gallery/'.$gallery->gallery_id) }}" 
                            class="btn btn-primary btn-mini" title="Edit Gallery">Edit</a> 
                          <a href="{{ url('/admin/add-images-album/'.$gallery->gallery_id) }}" 
                            class="btn btn-info btn-mini" title="Add Image in Album">Add Img</a>                                            
                          <a rel="{{ $gallery->gallery_id }}" rel1="delete-gallery" href="javascript:" 
                            class="btn btn-danger btn-mini deleteRecord" title="Delete Gallery">Delete</a></td>
                      </tr>     
                    @endforeach
                                            
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection