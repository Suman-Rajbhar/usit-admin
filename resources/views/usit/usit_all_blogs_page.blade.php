@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Blogs</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a href="{{url('add-usit-blog')}}" class="btn btn-xs btn-primary">Add More</a></li>
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
          <th>Blog Title</th>
          <th>Blog Type</th>
          <th>Blog Tags</th>
          <th class="text-right">Option</th>
        </tr>
      </thead>
      <tbody>
      <?php $list = 1; ?>
      @foreach($blogs as $blog)
        <tr>
          <th style="width: 12px; text-align: left;">{{$list++}}.</th>
          <td>{{$blog->blog_title}}</td>
          <td>{{$blog->blogType->service}}</td>
          <td>{{$blog->tags}}</td>
          <td class="text-right">
          <a href="{{url('edit-usit-blog/'.$blog->blog_id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> </a>
          <a href="{{url('view-usit-blog/'.$blog->blog_id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> </a>
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