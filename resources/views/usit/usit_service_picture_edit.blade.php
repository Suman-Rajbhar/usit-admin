@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-12"></div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Service Picture</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
      @if (\Session::has('success'))
          <div class="alert alert alert-success alert-dismissible fade in">
                  <span>{!! \Session::get('success') !!}</span>
          </div>
      @endif
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    <br>
    <form id="demo-form" action="{{url('update-usit-service-picture')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="control-group">
      <p>{{$service->service}}</p>
      <input type="hidden" value="{{$service->service_id}}" name="service_id">
        <div class="image view view-first">
          {{HTML::image($service->service_image, 'US IT SOLUTION', array('width'=>'100%'))}}
        </div>
    </div>
    <div class="control-group">
      <input type="file"  name="service_picture" class="form-control">
    </div>
    <br>
    <input type="submit" class="btn btn-info" value="Update Service Picture">
    </form>
  </div>
</div>
</div>
  </div>
</div>
@endsection