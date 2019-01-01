@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>About USIT</h2>
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
    <form id="demo-form" data-parsley-validate="" novalidate="" action="{{url('update-about-info')}}" method="post">
    <input type="hidden" name="id" value="{{$about_info->id}}">
    {{ csrf_field() }}
    <p>
      <label for="fullname">About us * :</label>
      <textarea class="form-control" name="about_us" required="" rows="5">{{$about_info->about_us}}</textarea>

      <label for="fullname">Mission * :</label>
      <textarea class="form-control" name="mission" required="" rows="5">{{$about_info->mission}}</textarea>

      <label for="fullname">Vision * :</label>
    <textarea class="form-control" name="vision" required="" rows="5">{{$about_info->vision}}</textarea>
    <label for="fullname">Why US IT * :</label>
    <textarea class="form-control" name="why_usit" required="" rows="5">{{$about_info->why_usit}}</textarea>




          <br>
          <input type="submit" class="btn btn-primary" value="Save About Information">

    </p></form>
  </div>
</div>
</div>

  </div>
</div>
@endsection