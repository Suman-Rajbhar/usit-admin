@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>Member List</h2>
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
    <br>
    <div class="x_content">
    <table class="table table-bordered">
        <thead>
            <th>SL.</th>
            <th>Account No.</th>
            <th>Member Name</th>
            <th>Father/Husband</th>
            <th>Contact</th>
            <th>Option</th>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr>
                <td>1.</td>
                <td>{{$member->account_id}}</td>
                <td>{{$member->name}}</td>
                <td>{{$member->father_husband}}</td>
                <td>{{$member->contact}}</td>
                <td><a href="{{url('view-member-profile/'.$member->member_id)}}" class="label label-success">View Profile</a></td>
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