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
    <p>
      <label for="fullname">About us :</label>
      <p>{{$about_info->about_us}}</p>

      <label for="fullname">Mission :</label>
      <p>{{$about_info->mission}}</p>

      <label for="fullname">Vision :</label>
    <p>{{$about_info->vision}}</p>
    <label for="fullname">Why US IT :</label>
    <p>{{$about_info->why_usit}}</p>

          <br>
<a href="{{url('set-about-usit')}}" class="btn btn-info">Update Information</a>

    </p>
  </div>
</div>
</div>

  </div>
</div>
@endsection