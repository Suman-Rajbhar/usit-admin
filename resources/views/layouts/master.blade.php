<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>::USITSOLUTION ADMINISTRATION::</title>

    <!-- Bootstrap -->
    {{HTML::style('admin_temp/vendors/bootstrap/dist/css/bootstrap.min.css')}}
    <!-- Font Awesome -->
    {{HTML::style('admin_temp/vendors/font-awesome/css/font-awesome.min.css')}}
    <!-- NProgress -->
    {{HTML::style('admin_temp/vendors/nprogress/nprogress.css')}}
    <!-- iCheck -->
    {{HTML::style('admin_temp/vendors/iCheck/skins/flat/green.css')}}
    <!-- bootstrap-progressbar -->
    {{HTML::style('admin_temp/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}
    <!-- JQVMap -->
   {{HTML::style('admin_temp/vendors/jqvmap/dist/jqvmap.min.css')}}
    <!-- bootstrap-daterangepicker -->
    {{HTML::style('admin_temp/vendors/bootstrap-daterangepicker/daterangepicker.css')}}

    {{--multi select--}}
        {{HTML::style('admin_temp/vendors/jquery-multi-select/css/multi-select.css')}}
        <!-- Custom Theme Style -->
        {{HTML::style('admin_temp/build/css/custom.min.css')}}

        <!-- Custom styles for this template -->
            {{HTML::style('admin_temp/css/style.css')}}
            {{HTML::style('admin_temp/css/style-responsive.css')}}
  </head>

  <body class="nav-md">
   <div class="container body">
         <div class="main_container">
           <div class="col-md-3 left_col">
             <div class="left_col scroll-view">
               <div class="navbar nav_title" style="border: 0;">
                 {{--<a href="{{url('admin-panel')}}" class="site_title"><i class="fa fa-gears"></i> <span>ADMIN</span></a>--}}
               </div>

               <div class="clearfix"></div>

               <!-- menu profile quick info -->
               <div class="profile clearfix">
                   <div class="flex">
                     <ul class="list-inline widget_profile_box">


                       <li>

                       {{HTML::image('usit-logo.png', '', array('class'=>'img-circle profile_img'))}}

                       </li>
                       <li style="width: 61%; margin-top: 2px;">
                         <h6 class="name">{{Auth::user()->name}}</h6>
                       </li>
                     </ul>
                   </div>
                   <div class="clearfix"></div>
                   </div>
               <!-- /menu profile quick info -->

               <br />

               <!-- sidebar menu -->
               <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                 <div class="menu_section">
                   <h3>General</h3>
                   <ul class="nav side-menu">
                   <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                     <li><a href="{{url('about-usit')}}"><i class="fa fa-home"></i> About USIT</a></li>

                     <li><a><i class="fa fa-file-code-o"></i> USIT Features <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{url('usit-features')}}"> Add Features</a></li>
                        <li><a href="{{url('get-usit-features/')}}">All Features</a></li>
                      </ul>
                      </li>

                      <li><a><i class="fa fa-briefcase"></i> USIT Services <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{url('usit-services')}}"> Add Services</a></li>
                          <li><a href="{{url('get-usit-services/')}}">All Services</a></li>
                        </ul>
                        </li>
                    <li><a><i class="fa fa-users"></i> USIT Customers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('add-usit-customers')}}"> Add Customer</a></li>
                      <li><a href="{{url('get-usit-customers')}}">All Customers</a></li>
                    </ul>
                    </li>
                    <li><a><i class="fa fa-star"></i> USIT Portfolios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('add-usit-portfolio')}}"> Add Portfolio</a></li>
                      <li><a href="{{url('get-usit-portfolios')}}">All Portfolio</a></li>
                    </ul>
                    </li>
                    <li><a><i class="fa fa-map"></i> USIT Addresses <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('add-usit-address')}}"> Add Address</a></li>
                      <li><a href="{{url('get-usit-addresses')}}">All Addresses </a></li>
                    </ul>
                    </li>
                    <li><a><i class="fa fa-sliders"></i> USIT Sliders and Titles <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('add-usit-slider')}}"> Add Slider</a></li>
                      <li><a href="{{url('add-usit-slider-title')}}"> Add Slider Text</a></li>
                      <li><a href="{{url('get-usit-sliders-titles')}}">All Sliders/Texts </a></li>
                    </ul>
                    </li>
                    <li><a><i class="fa fa-clipboard"></i> USIT Blogs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('add-usit-blog')}}"> Add Blog</a></li>
                      <li><a href="{{url('get-usit-blogs')}}">All Blogs </a></li>
                    </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> USIT Pricing <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('add-usit-price-package')}}"> Add Price Package</a></li>
                      <li><a href="{{url('add-usit-price-package-feature')}}"> Add Package Feature</a></li>
                      <li><a href="{{url('add-usit-price-package-feature-offer')}}"> Add Pack Feature Offer</a></li>
                      <li><a href="{{url('get-usit-price-chart')}}">USIT Pricing Chart</a></li>
                    </ul>
                    </li>

{{--                     <li><a href="{{url('usit-features')}}"><i class="fa fa-home"></i> USIT Features</a></li>--}}
{{--                     <li><a href="{{url('usit-services')}}"><i class="fa fa-briefcase"></i> USIT Services</a></li>--}}


                                          
                   </ul>
                 </div>

               </div>
               <!-- /sidebar menu -->

               <!-- /menu footer buttons -->
               <div class="sidebar-footer hidden-small">
                 <a data-toggle="tooltip" data-placement="top" title="Settings">
                   <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                 </a>
                 <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                   <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                 </a>
                 <a data-toggle="tooltip" data-placement="top" title="Lock">
                   <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                 </a>
                 <a data-toggle="tooltip" data-placement="top" title="Logout">
                   <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                 </a>
               </div>
               <!-- /menu footer buttons -->
             </div>
           </div>

           <!-- top navigation -->
           <div class="top_nav">
             <div class="nav_menu">
               <nav>
                 <div class="nav toggle">
                   <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                 </div>

                 <ul class="nav navbar-nav navbar-right">
                   <li class="">
                     <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                       <img src="images/img.jpg" alt="">{{Auth::user()->email}}
                       <span class=" fa fa-angle-down"></span>
                     </a>
                     <ul class="dropdown-menu dropdown-usermenu pull-right">
                       <li><a href="javascript:;"> Profile</a></li>
                       <li>
                         <a href="javascript:;">
                           <span class="badge bg-red pull-right">50%</span>
                           <span>Settings</span>
                         </a>
                       </li>
                       <li><a href="javascript:;">Help</a></li>
                       <li>
                       <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
                       </li>

                     </ul>
                   </li>
                 </ul>
               </nav>
             </div>
           </div>
           <!-- /top navigation -->

           <!-- page content -->
           @yield('content')
           <!-- /page content -->

           <!-- footer content -->
           <footer>
             <div class="pull-right">
               US IT SOLUTION
             </div>
             <div class="clearfix"></div>
           </footer>
           <!-- /footer content -->
         </div>
       </div>

     <!-- jQuery -->
        {{HTML::script('admin_temp/vendors/jquery/dist/jquery.min.js')}}
        <!-- Bootstrap -->
        {{HTML::script('admin_temp/vendors/bootstrap/dist/js/bootstrap.min.js')}}
        <!-- FastClick -->
            {{HTML::script('admin_temp/vendors/fastclick/lib/fastclick.js')}}
            <!-- NProgress -->
            {{HTML::script('admin_temp/vendors/nprogress/nprogress.js')}}

            <!-- iCheck -->
                     {{HTML::script('admin_temp/vendors/iCheck/icheck.min.js')}}
        <!-- Chart.js -->
        {{HTML::script('admin_temp/vendors/Chart.js/dist/Chart.min.js')}}
        <!-- gauge.js -->
        {{HTML::script('admin_temp/vendors/gauge.js/dist/gauge.min.js')}}
        <!-- bootstrap-progressbar -->
        {{HTML::script('admin_temp/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}

        <!-- Skycons -->
        {{HTML::script('admin_temp/vendors/skycons/skycons.js')}}
        <!-- Flot -->
        {{HTML::script('admin_temp/vendors/Flot/jquery.flot.js')}}
        {{HTML::script('admin_temp/vendors/Flot/jquery.flot.pie.js')}}
        {{HTML::script('admin_temp/vendors/Flot/jquery.flot.time.js')}}
        {{HTML::script('admin_temp/vendors/Flot/jquery.flot.stack.js')}}
        {{HTML::script('admin_temp/vendors/Flot/jquery.flot.resize.js')}}
        <!-- Flot plugins -->
        {{HTML::script('admin_temp/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}
        {{HTML::script('admin_temp/vendors/flot-spline/js/jquery.flot.spline.min.js')}}
        {{HTML::script('admin_temp/vendors/flot.curvedlines/curvedLines.js')}}
        <!-- DateJS -->
        {{HTML::script('admin_temp/vendors/DateJS/build/date.js')}}
        <!-- JQVMap -->
        {{HTML::script('admin_temp/vendors/jqvmap/dist/jquery.vmap.js')}}
        {{HTML::script('admin_temp/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}
        {{HTML::script('admin_temp/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}
        <!-- bootstrap-daterangepicker -->
        {{HTML::script('admin_temp/vendors/moment/min/moment.min.js')}}
        {{HTML::script('admin_temp/vendors/bootstrap-daterangepicker/daterangepicker.js')}}

        <!--this page plugins-->

                      {{HTML::script('admin_temp/assets/fuelux/js/spinner.min.js')}}
                      {{HTML::script('admin_temp/assets/bootstrap-fileupload/bootstrap-fileupload.js')}}
                      {{HTML::script('admin_temp/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
                      {{HTML::script('admin_temp/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}
                      {{HTML::script('admin_temp/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
                      {{HTML::script('admin_temp/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}
                      {{--{{HTML::script('admin_temp/assets/bootstrap-daterangepicker/moment.min.js')}}--}}
    {{--                  {{HTML::script('admin_temp/assets/bootstrap-daterangepicker/daterangepicker.js')}}--}}
                      {{HTML::script('admin_temp/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}
                      {{HTML::script('admin_temp/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}
                      {{HTML::script('admin_temp/assets/jquery-multi-select/js/jquery.multi-select.js')}}
                      {{HTML::script('admin_temp/assets/jquery-multi-select/js/jquery.quicksearch.js')}}
                      <!-- jQuery Tags Input -->
                          {{HTML::script('admin_temp/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}

                    <!--common script for all pages-->
    {{--                        {{HTML::script('admin_temp/js/common-scripts.js')}}--}}
                            <!--this page  script only-->
                            {{HTML::script('admin_temp/js/advanced-form-components.js')}}

        <!-- jQuery Smart Wizard -->
            {{HTML::script('admin_temp/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}



        {{--{{HTML::script('admin_temp/vendors/jquery-multi-select/js/jquery.multi-select.js')}}--}}
    {{--      {{HTML::script('admin_temp/vendors/jquery-multi-select/js/jquery.quicksearch.js')}}--}}

{{HTML::script('https://rawgit.com/RobinHerbots/Inputmask/4.x/dist/jquery.inputmask.bundle.js')}}

{{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
  {{--<script>tinymce.init({ selector:'textarea' });</script>--}}

                        <!-- Custom Theme Scripts -->
                                    {{HTML::script('admin_temp/build/js/custom.min.js')}}


        <script type="text/javascript">
            $(document).ready(function() {
              $(".add-more").click(function(){
                  var html = $(".copy").html();
                  $(".after-add-more").after(html);
              });
              $("body").on("click",".remove",function(){
                  $(this).parents(".control-group").remove();
              });
            });
        </script>


<script>
    $(document).ready(function(){
      $("#mobile").inputmask("+88-01999-999999");
    });
</script>

<!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->
    <script>
        $('.add-more-pack').click(function(){
        // Finding total number of elements added
          var total_element = $(".element").length;
          $(".added-pack").append('<p class="pp"><label for="fullname">Package Title * :</label><input type="text" class="form-control" name="title[]" required=""><label for="fullname">Package Price per month * :</label><input type="number" class="form-control" name="price[]"><label for="fullname">Offer in (%) * :</label><input type="number" class="form-control" name="offer[]"><br><button class="btn btn-danger remove-pack" type="button"><i class="glyphicon glyphicon-minus"></i> Remove Pack</button></p>');

          $("body").on("click",".remove-pack",function(){
                $(this).parents(".pp").remove();
           });

        });
    </script>

  </body>
</html>
