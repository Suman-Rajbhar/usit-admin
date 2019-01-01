@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-2 col-sm-6 col-xs-12"></div>
<div class="col-md-8 col-sm-6 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Edit Blog</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="overflow: hidden;">
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
      <p>
      {{HTML::image($blog->blog_image, '', array('width'=>'100%'))}}
      </p>

    <br>
    <form id="demo-form" action="{{url('update-blog')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <p>
          <label for="fullname">Blog Title * :</label>
          <input type="text" class="form-control" name="title" required="" value="{{$blog->blog_title}}">
          <input type="hidden" class="form-control" name="blog_id" required="" value="{{$blog->blog_id}}">

          <label for="fullname">Blog Category * :</label>
          <select class="form-control" name="service_id">
            <option value="">Select a Service Type</option>
            @foreach($services as $service)
                <option value="{{$service->service_id}}" @if($blog->blogType->service_id == $service->service_id) selected @endif>{{$service->service}}</option>
            @endforeach
          </select>
         <label for="fullname">Description :</label>
         <textarea class="form-control" name="desc" rows="7">{{$blog->description}}</textarea>

          <label for="fullname">Change Blog Picture * :</label>
          <input type="file" class="form-control" name="b_pic">

          <label for="fullname">Tags * :</label>
         <input id="tags_1" type="text" class="tags form-control" name="tags" value="{{$blog->tags}}" />
         {{--<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>--}}
          <br>
          <input type="submit" class="btn btn-primary" value="Update Blog">

        </p>
    </form>
  </div>
</div>
</div>

  </div>
</div>
@endsection
