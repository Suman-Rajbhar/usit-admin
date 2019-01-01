@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>New Member Admission <small class="text-danger"> [ picture for {{$member->name}} ] </small></h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
  @if (\Session::has('success'))
      <div class="alert alert alert-success alert-dismissible fade in">
              <span>{!! \Session::get('success') !!}</span>
      </div>
  @endif
  @if (\Session::has('error'))
    <div class="alert alert alert-danger alert-dismissible fade in">
            <span>{!! \Session::get('error') !!}</span>
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
    <form id="demo-form2" class="form-horizontal form-label-left" action="{{url('new-member-picture-save')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="ln_solid"></div>
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Member Picture
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="hidden" class="form-control col-md-7 col-xs-12" name="member_id" value="{{$member->member_id}}">
        <input type="file" class="form-control col-md-7 col-xs-12" name="member_pic" required="">
        <small class="text-danger">use only .jpeg, .jpg picture. file size not more than 300 KB</small>
      </div>
    </div>
    <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="{{url('account-setup/'.$member->member_id)}}" class="btn btn-primary">Skip</a>
          <input type="submit" class="btn btn-success" name="Submit" value="Save Picture">
        </div>
      </div>

    </form>
  </div>
</div>
</div>

  </div>
</div>
@endsection