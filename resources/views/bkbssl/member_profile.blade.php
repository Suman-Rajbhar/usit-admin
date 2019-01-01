@extends('layouts.master')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Member Profile</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Member Report <small>Account report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          @if($member->avatar)
                          {{HTML::image($member->avatar, 'GingerBD', array('class'=>'img-responsive avatar-view'))}}
                          @else
                          {{HTML::image('profile_pic/user.png', 'BSB', array('class'=>'img-responsive avatar-view'))}}
                          @endif
                        </div>
                      </div>
                      <h5>{{$member->name}}</h5>
                      <ul class="list-unstyled user_data">
                      <li>
                       <small>F/H Name : {{$member->father_husband}}</small>
                      </li>
                      <li>
                      <small>Nominee : {{$member->nominee}}</small>
                      </li>
                      <li>
                      <small>Relation : {{$member->relation}}</small>
                      </li>
                      </ul>

                      <a href="{{url('edit-member-profile/'.$member->member_id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />
                        <div class="project_detail">
                        <p class="title">Residence</p>
                        <p class="text-muted well well-sm no-shadow">
                        {{$member->pre_road}} {{$member->pre_area}}
                        {{$member->pre_upazila}} {{$member->pre_district." ".$member->pre_post_code}}
                        </p>
                        <p class="title">Permanent</p>
                        <p class="text-muted well well-sm no-shadow">
                        {{$member->per_road}} {{$member->per_area}}
                        {{$member->per_upazila}} {{$member->per_district." ".$member->per_post_code}}
                        </p>
                        <p class="title">Others</p>
                        <p class="text-muted well well-sm no-shadow">
                        Contact : {{$member->contact}}<br/>
                        Birth : {{$member->dob}}<br/>
                        Gender : {{$member->gender}}<br/>
                        </p>
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">

                            </ul>
                            <!-- end recent activity -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection