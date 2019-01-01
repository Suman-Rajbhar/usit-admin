@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Addresses</h2>
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
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">

                        <!-- price element -->
                        @foreach($addresses as $address)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title" style="height: 50px;">
                              <h2>{{$address->branch}}</h2>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li>{{$address->address_line_one}}</li>
                                    <li>{{$address->address_line_two}}</li>
                                    <li>{{$address->state_city}}</li>
                                    <li>{{$address->country}}</li>
                                    <li>{{$address->mobile}}</li>
                                    <li>{{$address->office_phone}}</li>
                                    <li>{{$address->email}}</li>
                                    <li><?php echo $address->map; ?></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="{{url('edit-address/'.$address->id)}}" class="btn btn-success btn-block" role="button">Edit</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <!-- price element -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </div>
</div>
</div>

  </div>
</div>
@endsection