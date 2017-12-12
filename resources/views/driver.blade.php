@extends ('layouts.layout')

@section ('content')
@include ('layouts.modal1')

<!-- services -->
    <div class="services two">
        <div class="container">
            <div class="container">
                <div class="row profile">
                    <div class="col-md-3 " >
                        <div class="profile-sidebar" style="border: 1px solid #ddd; ">
                           @include ('layouts.side-bar-panel')
                           <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class="active" >
                                        <a href="/driver">
                                        <i class="glyphicon glyphicon-home"></i>
                                        Tổng quan </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li  >
                                        <a href="/driver_product">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Danh sách đơn hàng </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="tongquan" class="profile-content" style="border: 1px solid #ddd; ">
                           <fieldset>
                               <legend class="text-semibold">
                                   Hồ sơ
                               </legend>
                               <div class="demo1">
                                   <form class="form-horizontal">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label class="col-lg-4 text-bold">
                                                   Email
                                               </label> 
                                               <div class="col-lg-8">
                                                   <span> {{Auth::user()->email}}</span>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label class="col-lg-4 text-bold">
                                                   Tên
                                               </label> 
                                               <div class="col-lg-8">
                                                   <span> {{Auth::user()->name}}</span>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                            <div class="form-group">
                                               <label class="col-lg-4 text-bold">
                                                   Mật khẩu
                                               </label> 
                                               <div class="col-lg-8">
                                                   <a href="change_pass" type="button" class="btn btn-primary">Change</a>
                                               </div>
                                           </div>
                                           
                                       </div>
                                   </form>
                               </div>
                           </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- //services -->

<script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.countup.js"></script>

<script src="assets/js/simplePlayer.js"></script>

  <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>

 <script src="assets/js/owl.carousel.js"></script>

<script type="text/javascript" src="assets/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>
<script src="assets/js/bootstrap.js"></script>
@endsection
<!-- js -->

<!-- //here ends scrolling icon -->