@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Customers</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a href="{{url('usit-features')}}" class="btn btn-xs btn-primary">Add More</a></li>
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
    <div class="row">
@foreach($customers as $customer)
<a href="{{url('edit-usit-customer/'.$customer->id)}}">
  <div class="col-md-4">
    <div class="thumbnail" style="height: 300px;">
      <div class="image view view-first" style="height: 180px;">
        {{HTML::image($customer->image_path, 'US IT SOLUTION', array('width'=>'100%'))}}
        <div class="mask">
          <p>{{$customer->customer_name}}<br><small>{{$customer->designation}}</small><br><small>{{$customer->organization}}</small></p>
        </div>
      </div>
      <div class="caption">
      <i class="fa fa-commenting-o"></i>
        <p>{{$customer->feedback}}</p>
      </div>
    </div>
  </div>
  </a>
  @endforeach
</div>

  </div>
</div>
</div>
  </div>
</div>
@endsection