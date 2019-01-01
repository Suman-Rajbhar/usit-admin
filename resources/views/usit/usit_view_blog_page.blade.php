@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>USIT Blog view</h2>
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
    <p>
    {{HTML::image($blog->blog_image)}}
    </p>
    <p>
      <label for="fullname">{{$blog->blog_title}}</label>
      <p>{{$blog->description}}</p>

      <label for="fullname">Blog Type</label>
      <p>{{$blog->blogType->service}}</p>
      <label for="fullname">Blog Type</label>
      <p>{{$blog->tags}}</p>

          <br>
      <a href="{{url('edit-usit-blog/'.$blog->blog_id)}}" class="btn btn-info">Update Blog</a>

    </p>
  </div>
</div>
</div>

  </div>
</div>
@endsection