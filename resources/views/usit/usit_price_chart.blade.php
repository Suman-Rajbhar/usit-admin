@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Price Chart</h2>
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
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel" style="height:600px;">
      <div class="x_title">
        <h2>Pricing Tables Design</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-md-12">
            <!-- price element -->
            <?php $usclass = new \App\Http\Controllers\Usclass(); ?>
            @foreach($packages as $package)
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="pricing ui-ribbon-container">
                <div class="ui-ribbon-wrapper">
                @if($package->offer > 0)
                  <div class="ui-ribbon">
                    {{$package->offer}}% Off
                  </div>
                @endif
                </div>
                <div class="title">
                  <h2>{{$package->package_name}}</h2>
                  <h1>${{$package->price_range}}</h1>
                  <span>Monthly</span>
                </div>
                <div class="x_content">
                  <div class="">
                    <div class="pricing_features">
                      <ul class="list-unstyled text-left">
                      @foreach($features as $feature)
                      <?php $offer = $usclass->get_offer_features($package->package_id, $feature->package_feature_id); ?>
                        <li>
                        @if($offer)
                            <a href="{{url('delete-from-package/'.$offer->id)}}"><i class="fa fa-check text-success"></i> {{$feature->package_feature}}</a>
                        @else
                            <a href="{{url('add-to-package/'.$package->package_id.'/'.$feature->package_feature_id.'/'.$feature->id)}}"><i class="fa fa-times text-danger"></i> {{$feature->package_feature}}</a>
                        @endif
                        </li>
                      @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="pricing_footer">
                    <a href="{{url('edit-package-info/'.$package->package_id)}}" class="btn btn-primary btn-block" role="button">Edit Package</a>
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
@endsection