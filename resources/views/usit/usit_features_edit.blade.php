@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-12"></div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Feature</h2>
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
    <form id="demo-form" action="{{url('update-usit-feature')}}" method="post">
    {{ csrf_field() }}
    <div class="control-group">
      <input type="text" name="feature" class="form-control" placeholder=" Enter US IT Feature" required="" value="{{$feature->feature}}">
      <input type="hidden" value="{{$feature->id}}" name="id">
    </div>
    <br>
    <input type="submit" class="btn btn-info" value="Update Feature">
    </form>
  </div>
</div>
</div>
  </div>
</div>
@endsection