
  @extends ('layouts.layout')
  @section ('content')
  @include ('layouts.modal1')
  <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

  <!-- services -->
      <div class="services two">
          <div class="container">
              <div class="container">
                  <div class="row profile">
                      <div class="col-md-3 " >
                          <div class="profile-sidebar" style="border: 1px solid #ddd; ">
                              
                              @include ('layouts.side-bar-panel')
                              <!-- END SIDEBAR USER TITLE -->


                             <!-- SIDEBAR MENU -->
                              <div class="profile-usermenu">
                                  <ul class="nav">
                                      <li class="active" >
                                          <a href="/panel">
                                          <i class="glyphicon glyphicon-home"></i>
                                          Tổng quan </a>
                                      </li>
                                      <li >
                                          <a href="/acc_role">
                                          <i class="glyphicon glyphicon-user"></i>
                                          Nâng cấp tài khoản </a>
                                      </li>

                                  </ul>
                              </div>
                              <!-- END MENU -->
                              <!-- END MENU -->
                          </div>
                      </div>
                      <div class="col-md-9">
                          <div id="tongquan" class="profile-content" style="border: 1px solid #ddd; ">
                          @if (Session::has('outofpermission'))
                                    <div class="alert alert-danger">{!! Session::get('outofpermission') !!}</div>
                                @endif
                             <fieldset>
                                 <legend class="text-semibold">
                                     Hồ sơ
                                 </legend>
                                 <div class="demo1">
                                     <form class="form-horizontal" action="change_role" id="role_form" method="post">
                                     {{ csrf_field() }}
                                         <div class="col-lg-6">
                                             <div class="form-group">
                                                 <label class="col-lg-4 text-bold">
                                                     Email
                                                 </label>
                                                 <div class="col-lg-8">
                                                     <span> {{$user->email}}</span>
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                 <label class="col-lg-4 text-bold">
                                                     Tên
                                                 </label>
                                                 <div class="col-lg-8">
                                                     <span> {{$user->name}}</span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-6">
                                                <div class="form-group">
                                                 <label class="col-lg-4 text-bold" for="role">
                                                     Chức vụ
                                                 </label>
                                                 <select name="role" class="col-lg-8 ui dropdown" id="role" form="role_form">
                                                    <option id="driver" value="2">Tài xế</option>
                                                    <option id="customer" value="3">Khách hàng</option>
                                                  </select>
                                                  </div>
                                                 
                                                    
                                                       <div class="col-lg-4">

                                                      <input type="hidden" name="id" value='{{$user->id}}'>
                                                      <div class="form-group" id="space-show" style="display:none;">
                                                      <label for="space">Nhập trọng tải xe</label>
                                                      <input type="text" class="form-control" id="space" name="space">
                                                      </div>
                                                      <button id="change" style="display:none;" class="submit-b" type="submit">Change</button>
                                                    </div>
                                             </div>
                                             <?php
  if ($user->role == 2) {
      echo "<script>";
      echo "$('#role').val(2);";
      echo "$('#change').css('display', 'none');";
      echo "$('#role').on('change', function() {";
      echo "if ($(this).val() == '2'){";
      echo "$('#change').css('display', 'none');";
      echo "} else {";
      echo "$('#change').css('display', 'block');}});";
      echo "</script>";
  } else {
      echo "<script>";
      echo "$('#role').val(3);";
      echo "$('#change').css('display', 'none');";
      echo "$('#role').on('change', function() {";
      echo "if ($(this).val() == '3'){";
      echo "$('#change').css('display', 'none');";
      echo "} else {";
      echo "$('#space-show').css('display', 'block');";
      echo "$('#change').css('display', 'block');}});";
      echo "</script>";
  }
  ?>
                                             <script type="text/javascript">
                                               $('#role').on('change', function() {






                                             </script>
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