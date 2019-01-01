@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>US IT Banner Sliders <a href="{{url('add-usit-slider')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus-square"></i> </a></h2>
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

        <div class="row">
@foreach($sliders as $slider)
      <div class="col-md-4">

      @if($slider->is_active == 1)
      <div class="thumbnail" style="border: 1px #0063dc solid; height: auto;">
          <div class="image view view-first" style="height: auto;">
            {{HTML::image($slider->slider_path, 'US IT SOLUTION', array('width'=>'100%'))}}
            <div class="mask no-caption">
              <div class="tools">
              <a href="{{url('change-slider-image/'.$slider->id)}}" style="border-bottom: 2px #ddd solid;">change slider image</a>
              @if($slider->is_active == 0)
              <a href="{{url('active-slider-image/'.$slider->id)}}">active in page</a>
              @endif
            </div>

            </div>
          </div>
        </div>
        @endif

        @if($slider->is_active == 0)
          <div class="thumbnail" style="border: 1px #fff solid; height: auto;">
          <div class="image view view-first" style="height: auto;">
            {{HTML::image($slider->slider_path, 'US IT SOLUTION', array('width'=>'100%'))}}
            <div class="mask no-caption">
              <div class="tools">
              <a href="{{url('change-slider-image/'.$slider->id)}}" style="border-bottom: 2px #ddd solid;">change slider image</a>
              @if($slider->is_active == 0)
              <a href="{{url('active-slider-image/'.$slider->id)}}">active in page</a>
              @endif
            </div>
            </div>
          </div>
            </div>
          @endif
      </div>
      @endforeach
    </div>
  </div>
  <div class="x_content">
    <h2>Slider Titles <a href="{{url('add-usit-slider-title')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus-square"></i> </a></h2>
    <table class="table ">
    <thead>
    <th style="width: 10px; text-align: left;">No.</th>
    <th>Titles</th>
    <th>Sub Titles</th>
    <th style="text-align: right;">Option</th>
    </thead>
    <tbody>
    <?php $list = 1; ?>
    @foreach($titles as $title)
    <tr>
        <td style="width: 10px; text-align: left;">{{$list++}}.</td>
        <td>{{$title->slider_text}}</td>
        <td>{{$title->sub_text}}</td>
        <td style="text-align: right;"><a href="{{url('edit-slider-title/'.$title->id)}}" class="btn btn-sm btn-info">Edit</a></td>
    </tr>
    @endforeach
    </tbody>
    </table>
  </div>
</div>
</div>
</div>
  </div>
</div>

@endsection