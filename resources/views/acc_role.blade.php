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
                                    <li  >
                                        <a href="/panel">
                                        <i class="glyphicon glyphicon-home"></i>
                                        Tổng quan </a>
                                    </li>
                                    <li class="active">
                                        <a href="/acc_role">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Nâng cấp tài khoản </a>
                                    </li>
                                    <li >
                                        <a href="/plan">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Lên lịch cho nhân viên </a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="tongquan" class="profile-content" style="border: 1px solid #ddd; ">
                        <fieldset>
                               <legend class="text-semibold">
                                   Truy cập vào trang chỉnh sửa quyền Thành viên
                               </legend>
                               <form action="open_user" method="post">
                               {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email">Email của thành viên</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                @if (Session::has('outofpermission'))
                                    <div class="alert alert-danger">{!! Session::get('outofpermission') !!}</div>
                                @endif
                                @include('layouts.errors')
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
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