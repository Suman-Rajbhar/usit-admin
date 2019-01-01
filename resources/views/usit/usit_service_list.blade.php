@extends('layouts.master')
@section('content')
<div class="right_col" role="main" style="min-height: 600px;">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h2>US IT Services</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a href="{{url('usit-services')}}" class="btn btn-xs btn-primary">Add More</a></li>
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
          <th>Services</th>
          <th style="width: 200px; text-align: left;">Description</th>
          <th>Service Features</th>
          <th>Picture</th>
          <th class="text-right">Option</th>
        </tr>
      </thead>
      <tbody>
      <?php $list = 1; $listpic = 0; ?>
      @foreach($services as $service)
        <tr>
          <th style="width: 12px; text-align: left;">{{$list++}}.</th>
          <td>{{$service->service}}</td>
          <td>
          @if($service->service_description != "")
          {{$service->service_description}}
          @else
          <a href="{{url('add-service-description/'.$service->service_id)}}" class="btn btn-xs btn-warning"><i class="fa fa-plus"></i> </a>
          @endif
          </td>
          <td>
          @if(count($service->getAllfeatures) > 0)
            <ul>
            <?php $list_feature = 1; ?>
                @foreach($service->getAllfeatures as $feature)
                    <li>{{$list_feature++}}. {{$feature->feature}} <span class="label label-info pull-right"><a href="{{url('edit-service-feature/'.$feature->id)}}"> <i class="fa fa-edit"></i> </a></span> </li>
                @endforeach
            </ul>
            <a href="{{url('add-service-features/'.$service->service_id)}}" class="btn btn-xs btn-warning">add more features</a>
          @else
          <a href="{{url('add-service-features/'.$service->service_id)}}" class="btn btn-xs btn-warning"><i class="fa fa-plus"></i> </a>
          @endif
          </td>
          <td class="col-md-55">
            @if($service->service_image != "")
            <div class="thumbnail" style="height: auto;">
              <div class="image view view-first">
                {{HTML::image($service->service_image, 'US IT SOLUTION', array('width'=>'100%'))}}
                <div class="mask">
                  <p>Change Image</p>
                  <div class="tools tools-bottom">
                    <a href="{{url('update-service-picture/'.$service->service_id)}}"><i class="fa fa-pencil"></i></a>
                  </div>
                </div>
              </div>
            </div>
            @else
            <?php $listpic++; ?>
            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal{{$listpic}}">
              Add Picture
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$listpic}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$service->service}} :: <small>add a Brand Picture</small></h5>
                  </div>
                  <div class="modal-body">
                    <form id="demo-form" action="{{url('update-usit-service-picture')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                      <input type="file" name="service_picture" class="form-control">
                      <input type="hidden" value="{{$service->service_id}}" name="service_id">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-info btn-sm" value="Add Service Picture">
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </td>
          <td class="text-right">
          <a href="{{url('edit-usit-service/'.$service->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> </a>
          <a href="{{url('view-usit-service/'.$service->service_id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> </a>
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