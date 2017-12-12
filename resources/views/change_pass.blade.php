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
                                    <li class="active">
                                        @if (Auth::user()->role==1)
                                        <a href="/panel">
                                        @elseif (Auth::user()->role==2)
                                        <a href="/driver">
                                        @else 
                                        <a href="/customer">
                                        @endif
                                        <i class="glyphicon glyphicon-home"></i>
                                        Tổng quan </a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="profile-content" style="border: 1px solid #ddd; ">
                           <form action="update_pass" method="post">
                           {{ csrf_field() }}
                            <div class="form-group">
                                <label for="oldpass">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id="oldpass" name="oldpass">
                            </div>
                            <div class="form-group">
                                <label for="newpass">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="newpass" name="newpass">
                            </div>
                            <div class="form-group">
                                <label for="newpass_confirmation">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" id="newpass_confirmation" name="newpass_confirmation">
                            </div>
                            @include('layouts.errors')
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                            </form>
                            @if (Session::has('passsuccess'))
                                <div class="alert alert-success">{!! Session::get('passsuccess') !!}</div>
                            @endif
                            @if (Session::has('passfailure'))
                                <div class="alert alert-danger">{!! Session::get('passfailure') !!}</div>
                            @endif
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