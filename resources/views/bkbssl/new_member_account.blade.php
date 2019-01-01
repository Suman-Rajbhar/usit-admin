@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>New Member Account Setup</h2>
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
    <form id="demo-form2" class="form-horizontal form-label-left" action="{{url('new-account-setup')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Account/Member No.: <span class="required">*</span>
        </label>
        <div class="col-md-2 col-sm-2 col-xs-6">
          <input type="number" required="required" name="account_id" class="form-control col-md-3 col-xs-6" value="{{$member->account_id}}" readonly>
          <input type="hidden" required="required" name="member_id" class="form-control col-md-3 col-xs-6" value="{{$member->member_id}}" readonly>
        </div>
      </div>
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Member Name <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" required="required" name="name" class="form-control col-md-7 col-xs-12" value="{{$member->name}}" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deposit Pack (in TK) <span class="required">*</span>
      </label>
      <div class="col-md-2 col-sm-2 col-xs-6">
        <input type="number" required="required" name="deposit_pack" class="form-control col-md-7 col-xs-12" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Saving Type <span class="required">*</span>
      </label>
      <div class="col-md-3 col-sm-3 col-xs-6">
      <select name="save_type" class="form-control" required="">
      <option value="">Select Saving Type</option>
      <option value="Daily">Daily Save</option>
      <option value="Weekly">Weekly Save</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deposit <small>(First Amount Deposit Date) <span class="required">*</span></small>
      </label>
      <div class="col-md-3 col-sm-3 col-xs-6">
      <input type="date" required="required" name="deposit_date" class="form-control col-md-7 col-xs-12" value="{{date('Y-m-d')}}">
      </div>
    </div>
      <div class="ln_solid"></div>
    <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-primary">Cancel</button>
          <input type="submit" class="btn btn-success" name="Submit" value="Save and Deposit Confirm">
        </div>
      </div>

    </form>
  </div>
</div>
</div>

  </div>
</div>
@endsection