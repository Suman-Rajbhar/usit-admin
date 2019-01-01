@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-md-8 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Service :: {{$service->service}}</h2>
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
    <form id="demo-form" action="{{url('save-usit-service-description')}}" method="post">
    {{ csrf_field() }}
    <div class="control-group">
      <textarea name="description" class="form-control" required=""></textarea>
      <input type="hidden" name="service_id" class="form-control" value="{{$service->service_id}}">
    </div>
    <br>
    <input type="submit" class="btn btn-info" value="Save Service Description">
    </form>
  </div>
</div>
</div>
  </div>
</div>
@endsection