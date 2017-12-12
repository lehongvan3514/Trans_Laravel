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
                                        <a href="/panel">
                                        <i class="glyphicon glyphicon-home"></i>
                                        Tổng quan </a>
                                    </li>
                                    <li >
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
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="tongquan" class="profile-content" style="border: 1px solid #ddd; ">
                           <fieldset>
                               <legend class="text-semibold">
                                   Danh sách tài xế - {{$kg}} Kg
                               </legend>
                               @if (Session::has('mess'))
                                                            <div class="alert alert-success">{!! Session::get('mess') !!}</div>
                                                        @endif
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Trọng tải còn thừa</th>

                                    <th>Chọn</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($drivers_final as $driver)
                                <tr>
                                  <td>{{$driver->name}}</td>
                                  
                                  <td>
                                     @foreach ($spaces as $space)
                                      @if ($space->driver_id == $driver->id)
                                        {{$space->trong_tai-$space->current}}
                                      @endif
                                    @endforeach
                                  </td>

                                  <td>
                                    <?php
                                      echo "<a href ='/change_plan/{$product_id}/{$driver->id}'> Chọn tài xế </a>  "
                                    ?>

                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>   
                                               </fieldset>
                                            </div>
                                        </div>
                </div>
            </div>
        </div>
    </div>
<!-- //services -->

<script type="text/javascript" src="/assets/js/jquery-2.1.4.min.js"></script>

  <script src="/assets/js/jquery.waypoints.min.js"></script>
  <script src="/assets/js/jquery.countup.js"></script>

<script src="/assets/js/simplePlayer.js"></script>

  <script type="text/javascript" src="/assets/js/jquery.flexisel.js"></script>

 <script src="/assets/js/owl.carousel.js"></script>

<script type="text/javascript" src="/assets/js/move-top.js"></script>
<script type="text/javascript" src="/assets/js/easing.js"></script>
<script src="/assets/js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endsection
<!-- js -->

<!-- //here ends scrolling icon -->