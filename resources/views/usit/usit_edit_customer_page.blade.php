@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
    <div class="row">
        <div class="col-md-2 col-sm-6 col-xs-12"></div>
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>US IT Edit Customer</h2>
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
                    {{HTML::image($customer->image_path)}}
                    <br>
                    <form id="demo-form" action="{{url('update-customer-info')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <p>
                            <label for="fullname">Customer Name * :</label>
                            <input type="text" class="form-control" name="c_name" required="" value="{{$customer->customer_name}}">
                            <input type="hidden" class="form-control" name="c_id" required="" value="{{$customer->id}}">

                            <label for="fullname">Customer Designation * :</label>
                            <input type="text" class="form-control" name="c_designation" value="{{$customer->designation}}">

                            <label for="fullname">Change Picture :</label>
                            <input type="file" class="form-control" name="c_pic">

                            <label for="fullname">Customer Organization * :</label>
                            <input type="text" class="form-control" name="c_org" value="{{$customer->organization}}">

                            <label for="fullname">Customer Feedback * :</label>
                            <textarea class="form-control" name="c_feedback">{{$customer->feedback}}</textarea>
                            <br>
                            <input type="submit" class="btn btn-primary" value="Update Customer">

                        </p>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection