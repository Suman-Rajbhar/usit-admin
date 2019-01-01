@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>New Member Admission</h2>
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
    <form id="demo-form2" class="form-horizontal form-label-left" action="{{url('new-member-submit')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Account/Member No.: <span class="required">*</span>
        </label>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <input type="number" required="required" name="account_id" class="form-control col-md-3 col-xs-6" value="">
        </div>
      </div>
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Member Name <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" required="required" name="name" class="form-control col-md-7 col-xs-12" value="">
      </div>
    </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nominee Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="last-name" name="nominee" required="required" class="form-control col-md-7 col-xs-12" value="">
        </div>
      </div>
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Relation <span class="required">*</span>
      </label>
      <div class="col-md-3 col-sm-3 col-xs-6">
        <input type="text" id="last-name" name="relation" required="required" class="form-control col-md-7 col-xs-12" value="">
      </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Father/Husband <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="last-name" name="father_husband" required="required" class="form-control col-md-7 col-xs-12" value="">
    </div>
  </div>
      <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number <span class="required">*</span></label>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="contact" value="" required="">
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <div id="gender" class="btn-group" data-toggle="buttons">
          <input type="radio" class="" name="gender" id="gender" value="Male" checked> Male
          <input type="radio" class="" name="gender" id="gender" value="Female"> Female
          <input type="radio" class="" name="gender" id="gender" value="Other"> Other
          </div>
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
        </label>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <input id="" name="dob" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" value="">
        </div>
      </div>
      <div class="form-group">

      <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital Status <span class="required">*</span></label>
      <div class="col-md-3 col-sm-3 col-xs-6">
        <select class="form-control" required="" name="marital_status">
          <option value="">Select Option</option>
          <option value="Married">Married</option>
          <option value="Single">Single</option>
          <option value="Divorced">Divorced</option>
          <option value="Widowed">Widowed</option>
        </select>
      </div>
    </div>
    <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Profession <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="profession" value="" required="">
    </div>
  </div>
  <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Company/Organization Name (if)</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="company" value="">
      </div>
    </div>
    <fieldset>
    <legend>Present Address</legend>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">House/Road <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="pre_road" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Area
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="last-name"  class="form-control col-md-7 col-xs-12" name="pre_area" value="">
        </div>
      </div>
      <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">P/S, P/O <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pre_upazila" value="" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Post Code </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="pre_post_code" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">City/District <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="pre_district" required="">
              <option selected="selected" value="0">Select a District</option>
              <option value="Bagerhat">Bagerhat</option>
              <option value="Bandarban">Bandarban</option>
              <option value="Barguna">Barguna</option>
              <option value="Barisal">Barisal</option>
              <option value="Bhola">Bhola</option>
              <option value="Bogra">Bogra</option>
              <option value="Brahamanbaria">Brahamanbaria</option>
              <option value="Chandpur">Chandpur</option>
              <option value="Chapai Nawabganj">Chapai Nawabganj</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Chuadanga">Chuadanga</option>
              <option value="Comilla">Comilla</option>
              <option value="Cox`s Bazar">Cox`s Bazar</option>
              <option value="Dhaka">Dhaka</option>
              <option value="Dinajpur">Dinajpur</option>
              <option value="Faridpur">Faridpur</option>
              <option value="Feni">Feni</option>
              <option value="Gaibanda">Gaibanda</option>
              <option value="Gazipur">Gazipur</option>
              <option value="Gopalganj">Gopalganj</option>
              <option value="Habiganj">Habiganj</option>
              <option value="Jaipurhat">Jaipurhat</option>
              <option value="Jamalpur">Jamalpur</option>
              <option value="Jessore">Jessore</option>
              <option value="Jhalokhathi">Jhalokhathi</option>
              <option value="Jhenaidah">Jhenaidah</option>
              <option value="Khagrachhari">Khagrachhari</option>
              <option value="Khulna">Khulna</option>
              <option value="Kishorganj">Kishorganj</option>
              <option value="Kurigram">Kurigram</option>
              <option value="Kushtia">Kushtia</option>
              <option value="Lalmonirhat">Lalmonirhat</option>
              <option value="Luxmipur">Luxmipur</option>
              <option value="Madaripur">Madaripur</option>
              <option value="Magura">Magura</option>
              <option value="Manikganj">Manikganj</option>
              <option value="Meharpur">Meharpur</option>
              <option value="Mouluvibazar">Mouluvibazar</option>
              <option value="Munshiganj">Munshiganj</option>
              <option value="Mymensingh" selected>Mymensingh</option>
              <option value="Naogaon">Naogaon</option>
              <option value="Narail">Narail</option>
              <option value="Narayanganj">Narayanganj</option>
              <option value="Narsingdi">Narsingdi</option>
              <option value="Natore">Natore</option>
              <option value="Netrokona">Netrokona</option>
              <option value="Nilphamari">Nilphamari</option>
              <option value="Noakhali">Noakhali</option>
              <option value="Pabna">Pabna</option>
              <option value="Panchagarh">Panchagarh</option>
              <option value="Patuakhali">Patuakhali</option>
              <option value="Pirojpur">Pirojpur</option>
              <option value="Rajbari">Rajbari</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Rangamati">Rangamati</option>
              <option value="Rangpur">Rangpur</option>
              <option value="Satkhira">Satkhira</option>
              <option value="Shariatpur">Shariatpur</option>
              <option value="Sherpur">Sherpur</option>
              <option value="Sirajganj">Sirajganj</option>
              <option value="Sunamganj">Sunamganj</option>
              <option value="Sylhet">Sylhet</option>
              <option value="Tangail">Tangail</option>
              <option value="Thakurgaon">Thakurgaon</option>
            </select>
          </div>
      </div>
</fieldset>
<fieldset>
    <legend>Permanent Address <label style="float: right;"><input type="checkbox" name="c_present" id="same" value="1"> <small>same above</small></label></legend>
    <div id="same_add" style="display: block">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">House/Road <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="per_road" required="required" class="form-control col-md-7 col-xs-12" name="per_road" value="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Area
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="per_area" class="form-control col-md-7 col-xs-12" name="per_area" value="">
        </div>
      </div>
      <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">P/S, P/O <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input id="per_upazila" class="form-control col-md-7 col-xs-12" type="text" name="per_upazila" value="" required="">
        </div>
      </div>
      <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Post Code </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="per_post_code" class="form-control col-md-7 col-xs-12" type="text" name="per_post_code" value="">
      </div>
    </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">City/District <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">

        <select class="select2_single form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="per_district" id="per_district" required="">
        <option selected="selected" value="0">Select a District</option>
        <option value="Bagerhat">Bagerhat</option>
        <option value="Bandarban">Bandarban</option>
        <option value="Barguna">Barguna</option>
        <option value="Barisal">Barisal</option>
        <option value="Bhola">Bhola</option>
        <option value="Bogra">Bogra</option>
        <option value="Brahamanbaria">Brahamanbaria</option>
        <option value="Chandpur">Chandpur</option>
        <option value="Chapai Nawabganj">Chapai Nawabganj</option>
        <option value="Chittagong">Chittagong</option>
        <option value="Chuadanga">Chuadanga</option>
        <option value="Comilla">Comilla</option>
        <option value="Cox`s Bazar">Cox`s Bazar</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Dinajpur">Dinajpur</option>
        <option value="Faridpur">Faridpur</option>
        <option value="Feni">Feni</option>
        <option value="Gaibanda">Gaibanda</option>
        <option value="Gazipur">Gazipur</option>
        <option value="Gopalganj">Gopalganj</option>
        <option value="Habiganj">Habiganj</option>
        <option value="Jaipurhat">Jaipurhat</option>
        <option value="Jamalpur">Jamalpur</option>
        <option value="Jessore">Jessore</option>
        <option value="Jhalokhathi">Jhalokhathi</option>
        <option value="Jhenaidah">Jhenaidah</option>
        <option value="Khagrachhari">Khagrachhari</option>
        <option value="Khulna">Khulna</option>
        <option value="Kishorganj">Kishorganj</option>
        <option value="Kurigram">Kurigram</option>
        <option value="Kushtia">Kushtia</option>
        <option value="Lalmonirhat">Lalmonirhat</option>
        <option value="Luxmipur">Luxmipur</option>
        <option value="Madaripur">Madaripur</option>
        <option value="Magura">Magura</option>
        <option value="Manikganj">Manikganj</option>
        <option value="Meharpur">Meharpur</option>
        <option value="Mouluvibazar">Mouluvibazar</option>
        <option value="Munshiganj">Munshiganj</option>
        <option value="Mymensingh" selected>Mymensingh</option>
        <option value="Naogaon">Naogaon</option>
        <option value="Narail">Narail</option>
        <option value="Narayanganj">Narayanganj</option>
        <option value="Narsingdi">Narsingdi</option>
        <option value="Natore">Natore</option>
        <option value="Netrokona">Netrokona</option>
        <option value="Nilphamari">Nilphamari</option>
        <option value="Noakhali">Noakhali</option>
        <option value="Pabna">Pabna</option>
        <option value="Panchagarh">Panchagarh</option>
        <option value="Patuakhali">Patuakhali</option>
        <option value="Pirojpur">Pirojpur</option>
        <option value="Rajbari">Rajbari</option>
        <option value="Rajshahi">Rajshahi</option>
        <option value="Rangamati">Rangamati</option>
        <option value="Rangpur">Rangpur</option>
        <option value="Satkhira">Satkhira</option>
        <option value="Shariatpur">Shariatpur</option>
        <option value="Sherpur">Sherpur</option>
        <option value="Sirajganj">Sirajganj</option>
        <option value="Sunamganj">Sunamganj</option>
        <option value="Sylhet">Sylhet</option>
        <option value="Tangail">Tangail</option>
        <option value="Thakurgaon">Thakurgaon</option>
        </select>
          </div>
      </div>
      </div>
</fieldset>


      <div class="ln_solid"></div>
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Member Picture
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" class="form-control col-md-7 col-xs-12" name="member_pic">
        <small class="text-danger">use only .jpeg, .jpg picture. file size not more than 300 KB</small>
      </div>
    </div>
    <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-primary">Cancel</button>
          <input type="submit" class="btn btn-success" name="Submit" value="Submit">
        </div>
      </div>

    </form>
  </div>
</div>
</div>

  </div>
</div>
@endsection