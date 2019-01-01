@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-2 col-sm-6 col-xs-12"></div>
<div class="col-md-8 col-sm-6 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Edit Address</h2>
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
    <form id="demo-form" action="{{url('update-address')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <p>
      <label for="fullname">Branch Name * :</label>
      <input type="text" class="form-control" name="b_name" required="" value="{{$address->branch}}">
      <input type="hidden" class="form-control" name="id" required="" value="{{$address->id}}">

      <label for="fullname">Address Line 1 * :</label>
     <input type="text" class="form-control" name="address_line_one" value="{{$address->address_line_one}}">
     <label for="fullname">Address Line 2 :</label>
     <input type="text" class="form-control" name="address_line_two" value="{{$address->address_line_two}}">

      <label for="fullname">State/City * :</label>
      <input type="text" class="form-control" name="state_city" value="{{$address->state_city}}">

      <label for="fullname">Country * :</label>
     <input type="text" class="form-control" name="country" value="{{$address->country}}">
     <label for="fullname">Mobile * :</label>
     <input type="text" class="form-control" name="mobile" value="{{$address->mobile}}">
     <label for="fullname">Office Phone * :</label>
      <input type="text" class="form-control" name="office_phone" value="{{$address->office_phone}}">
      <label for="fullname">Email * :</label>
      <input type="text" class="form-control" name="email" value="{{$address->email}}">
      <label for="fullname">Google Map * :</label>
      <input type="text" class="form-control" name="map" value="{{$address->map}}">
      <br>
      <input type="submit" class="btn btn-primary" value="Update Address">

    </p></form>
  </div>
</div>
</div>

  </div>
</div>
@endsection