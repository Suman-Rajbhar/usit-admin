@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-12"></div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Features</h2>
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
    <form id="demo-form" action="{{url('save-usit-features')}}" method="post">
    {{ csrf_field() }}
    <div class="input-group control-group after-add-more">
      <input type="text" name="featuremore[]" class="form-control" placeholder=" Enter US IT Feature" required="">
      <div class="input-group-btn">
        <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
      </div>
    </div>
    <br>
    <input type="submit" class="btn btn-info" value="Save Features">
    </form>

    <!-- Copy Fields -->
            <div class="copy hide">
              <div class="control-group input-group" style="margin-top:10px">
                <input type="text" name="featuremore[]" class="form-control" placeholder=" Enter US IT Feature" required="">
                <div class="input-group-btn">
                  <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
              </div>
            </div>


  </div>
</div>
</div>
  </div>
</div>
@endsection