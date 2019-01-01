@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-12"></div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Edit Price Package</h2>
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
    <form id="demo-form" action="{{url('update-usit-price-package')}}" method="post">
    {{ csrf_field() }}
           <p>
              <label for="fullname">Package Title * :</label>
              <input type="text" class="form-control" name="title" required="" value="{{$package->package_name}}">
              <input type="hidden" class="form-control" name="pack_id" required="" value="{{$package->package_id}}">

             <label for="fullname">Package Price per month * :</label>
             <input type="number" class="form-control" name="price" value="{{$package->price_range}}">

              <label for="fullname">Offer in (%) * :</label>
              <input type="number" class="form-control" name="offer" value="{{$package->offer}}">
            </p>
            <br>
            <input type="submit" class="btn btn-primary"value="Update Price Package">

    </form>



  </div>
</div>
</div>
  </div>
</div>
@endsection