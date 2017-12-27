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
                                        <a href="/customer">
                                        <i class="glyphicon glyphicon-home"></i>
                                        Tổng quan </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class="active" >
                                        <a href="/create_product">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Đặt hàng </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li >
                                        <a href="/product_list">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Đơn hàng </a>
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
                                Đặt hàng
                            </legend>
                            <div class="login-form">
                                <form action="/customer_product" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name">Tên đầy đủ</label>
                                        <input type="text" class="form-control" id="name" name="name" required="" value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">Số điện thoại</label>
                                        <input type="tel" class="form-control" id="tel" name="tel" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Khối lượng</label>
                                        <input type="tel" class="form-control" id="weight" name="weight" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="thoi_gian">Thời gian</label>
                                        <input type="date" style="width: 100%;" name="thoi_gian" required="">
                                    </div>
                                    <input type="text" hidden name="xuat_phat" id="xuat_phat">
                                    <div class="form-group">
                                        <label for="xuat_phat_details">Xuất phát</label>
                                        <input type="text" class="form-control" name="xuat_phat_details" id="xuat_phat_details" required="">
                                        <script>
                                        var a = true;
                                        $("#xuat_phat_details").click(function() {

                                            $('#map-container').css('display', 'block');
                                            $("#pac-input").val("");
                                            $("#pac-input").focus();
                                            google.maps.event.trigger(map, 'resize');
                                            map.setCenter(latlng);
                                            a= true;

                                        });
                                        </script>
                                    </div>
                                    <input type="text" hidden name="dich_den" id="dich_den">
                                    <div class="form-group">
                                        <label for="dich_den_details">Nơi đến</label>
                                        <input type="text" class="form-control" name="dich_den_details" id="dich_den_details" required="">
                                        @include('layouts.map')
                                        <script>
                                        $("#dich_den_details").click(function() {

                                            $('#map-container').css('display', 'block');
                                            $("#pac-input").val("");
                                            $("#pac-input").focus();
                                            google.maps.event.trigger(map, 'resize');
                                            map.setCenter(latlng);
                                            a=false;

                                        });
                                        $("#sendplace").click(function() {

                                            if (a){
                                              $('#xuat_phat_details').val(address);
                                              $('#xuat_phat').val(latlng);

                                              $('#close').click();
                                            }
                                            else{
                                            $('#dich_den_details').val(address);
                                            $('#dich_den').val(latlng);
                                            $('#close').click();
                                          }
                                        });

                                        $("#close").click(function() {
                                            $('#map-container').css('display', 'none');
                                        });
                                        </script>
                                    </div>
                                    @if (Session::has('guest_thanhcong'))
                                    <div class="alert alert-success">{!! Session::get('guest_thanhcong') !!}</div>
                                    @endif @include('layouts.errors')
                                    <button class="btn btn-primary" type="submit">Đặt hàng</button>
                                </form>
                            </div>
                        </fieldset>
                    </div>
                      <!--   <div id="tongquan" class="profile-content" style="border: 1px solid #ddd; ">
                         <fieldset>
                             <legend class="text-semibold">
                                 Đặt hàng
                             </legend>
                             <div class="login-form">
                              <form action="customer_product" method="post">
                              {{ csrf_field() }}
                              <div class="form-group">
                              <label for="name">Tên đầy đủ</label>
                              <input type="text" class="form-control" id="name" name="name" required="" value="{{Auth::user()->name}}">
                              </div>
                              <div class="form-group">
                              <label for="tel">Số điện thoại</label>
                              <input type="tel" class="form-control" id="tel" name="tel" required="">
                              </div>
                              <div class="form-group">
                              <label for="weight">Khối lượng</label>
                              <input type="tel" class="form-control" id="weight" name="weight" required="">
                              </div>
                              <div class="form-group">
                              <label for="thoi_gian">Thời gian</label>
                              <input type="date" style="width: 100%;" name="thoi_gian" required="">
                              </div>
                              <div class="form-group">
                              <label for="xuat_phat">Nơi xuất phát</label>
                              <select name="xuat_phat" class="form-control option-w3ls">
                                    <option>Vận chuyển từ</option>
                                    @include('layouts.diadiem')
                                </select>
                              </div>  
                              <div class="form-group">
                                <label for="xuat_phat_details">Địa chỉ cụ thể</label>
                                <input type="text"  class="form-control"  name="xuat_phat_details" id="xuat_phat_details" required="">
                              </div>
                              <div class="form-group">
                              <label for="dich_den">Đích đến</label>
                              <select name="dich_den" class="form-control option-w3ls">
                                    <option>Vận chuyển tới</option>
                                    @include('layouts.diadiem')
                                </select>
                              </div> 
                                <div class="form-group">
                                <label for="dich_den_details">Địa chỉ cụ thể</label>
                                <input type="text"  class="form-control" name="dich_den_details" id="dich_den_details" required="">
                              </div>
                                
                                @if (Session::has('guest_thanhcong'))
                                                  <div class="alert alert-success">{!! Session::get('guest_thanhcong') !!}</div>
                                              @endif
                                @include('layouts.errors')  
                                <button class="submit-b" type="submit">Đặt hàng</button>   
                              </form>
                            </div>
                         </fieldset>
                      </div> -->
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