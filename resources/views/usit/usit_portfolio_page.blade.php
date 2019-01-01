@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Portfolios</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a href="{{url('add-usit-portfolio')}}" class="btn btn-xs btn-primary">Add More</a></li>
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
    <table class="table">
      <thead>
        <tr>
          <th style="width: 12px; text-align: left;">#</th>
          <th>Portfolio</th>
          <th style="width: 200px; text-align: left;">Description</th>
          <th>Portfolio Features</th>
          <th>Thumb</th>
          <th style="text-align: right;">Option</th>
        </tr>
      </thead>
      <tbody>
      <?php $list = 1; $listpic = 0; ?>
      @foreach($portfolios as $portfolio)
        <tr>
          <td style="width: 12px; text-align: left;">{{$list++}}.</td>
          <td>{{$portfolio->product_name}}</td>
          <td>
          {{$portfolio->description}}
          </td>
          <td>
           <ul>
           @if(count($portfolio->getAllfeatures) > 0)
           <?php $list_feature = 1; ?>
           @foreach($portfolio->getAllfeatures as $p_feature)
           <li>{{$list_feature++}}. {{$p_feature->feature}}<span class="label label-info pull-right"><a href="{{url('edit-portfolio-feature/'.$p_feature->id)}}"> <i class="fa fa-edit"></i> </a></span></li>
           @endforeach
           <a href="{{url('add-portfolio-features/'.$portfolio->portfolio_id)}}" class="btn btn-xs btn-warning">add more features</a>
           @else
           <a href="{{url('add-portfolio-features/'.$portfolio->portfolio_id)}}" class="btn btn-xs btn-warning"><i class="fa fa-plus"></i> </a>
           @endif
           </ul>
          </td>
          <td class="col-md-55">
            <div class="thumbnail" style="height: auto;">
              <div class="image view view-first">
                {{HTML::image($portfolio->image_path, 'US IT SOLUTION', array('width'=>'100%'))}}
              </div>
            </div>

           <!-- Modal -->
          </td>
          <td class="text-right">
          <a href="{{url('edit-usit-portfolio/'.$portfolio->portfolio_id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> </a>
          <a href="{{url('view-usit-portfolio/'.$portfolio->portfolio_id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> </a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

  </div>
</div>
</div>
  </div>
</div>
@endsection