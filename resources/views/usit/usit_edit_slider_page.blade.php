@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-2 col-sm-6 col-xs-12"></div>
<div class="col-md-8 col-sm-6 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Edit Slider</h2>
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

<p>
{{HTML::image($slider->slider_path, '', array('width' => '100%'))}}
</p>
    <br>
    <form id="demo-form" action="{{url('update-slider')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <p>
      <label for="fullname">Change Slider * :</label>
      <input type="file" class="form-control" name="s_pic">
      <input type="hidden" class="form-control" name="sid" value="{{$slider->id}}">
          <br>
          <input type="submit" class="btn btn-primary" value="Save Slider">

    </p></form>
  </div>
</div>
</div>

  </div>
</div>
@endsection