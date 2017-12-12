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
                                    <li  >
                                        <a href="/create_product">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Đặt hàng </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class="active" >
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
                                   Danh sách đơn hàng
                               </legend>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Ngày giao hàng</th>
                <th>Nơi xuất phát</th>
                <th>Đích đến</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Ngày giao hàng</th>
                <th>Nơi xuất phát</th>
                <th>Đích đến</th>
                <th>Trạng thái</th>
            </tr>
        </tfoot>
        <tbody id="tbody" >
            @foreach ($products as $product)
            <tr id="{{$product->id}}">
              <td>{{$product->name}}</td>
              <td>{{$product->tel}}</td>
              <td>{{$product->ngay_giao_hang}}</td>
              <td>{{$product->xuat_phat_details}}</td>
              <td>{{$product->dich_den_details}}</td>
              
                <td>@if ($product->trang_thai == 0) Đang chờ xác nhận @elseif ($product->trang_thai ==1) Đang chờ tài xế lấy hàng @elseif ($product->trang_thai ==2) <a href="#" id="map_open">Đang lấy hàng </a>@elseif ($product->trang_thai ==3)  Hàng ở kho @elseif ($product->trang_thai ==4) Đang chờ chuyển cho khách hàng @elseif ($product->trang_thai ==5) Đang giao hàng @elseif ($product->trang_thai ==6) Đơn hàng hoàn thành @endif</td>

              
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
@include('layouts.map')
                                       
<script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.countup.js"></script>

<script src="assets/js/simplePlayer.js"></script>

  <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>

 <script src="assets/js/owl.carousel.js"></script>

<script type="text/javascript" src="assets/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>
<script src="assets/js/bootstrap.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script><script type="text/javascript">
    var load_ajax;
    var load_ajax2;
    var interval;
  $(document).ready(function() {
    $('#example').DataTable();
    
    load_ajax = function load_ajax(){
        $.ajax({
        url: "/ajax/product_list", 
        type:"GET",
        dataType:'json',
        data: {
            id: {{Auth::user()->id}},

        },
        success: function(result){
            //delete all child
            $("#tbody").empty();
            jQuery.each(result,function(i,val){

                switch (val['trang_thai']){
                    case 0:
                        $a = "Đang chờ xác nhận";
                        break;
                    case 1:
                        $a="Đang chờ tài xế lấy hàng";
                        break;
                    case 2:
                        $a = "<a href='#' id='map_open'>Đang lấy hàng </a>";
                        break;
                    case 3:
                        $a ="Hàng ở kho";
                        break;
                    case 4:
                        $a = "Đang chờ chuyển cho khách hàng";
                        break;
                    case 5:
                        $a = "Đang giao hàng";
                        break;
                    case 6:
                        $a = "Đơn hàng hoàn thành";
                        break;
                }
                $test = "<tr id='"+val['id'] +"'><td>"+val['name']+"</td><td>"+val['tel']+"</td><td>"+val['ngay_giao_hang']+"</td><td>"+val['xuat_phat_details']+"</td><td>"+val['dich_den_details']+"</td><td>"+$a+"</td></tr>"
                    $("#tbody").append($test);
                });
            
            

    }});
    };

    interval = setInterval(load_ajax, 600);
} );
</script>
 <script>
var a;
                                        $("#tbody").on("click","#map_open",function() {
                                            $("#sendplace").html("Refresh");
                                            a=$(this).parent().parent().attr('id');
                                            $('#map-container').css('display', 'block');
                                            $("#pac-input").val("");
                                            $("#pac-input").focus();
                                            google.maps.event.trigger(map, 'resize');
                                            
                                            $.ajax({
                                            url: "/ajax/location_update", 
                                            type:"GET",
                                            dataType:'json',
                                            data: {
                                                id: a,

                                            },
                                            success: function(result){
                                                //delete all child

                                                $x= result['lat'];
                                                $y= result['lng'];
                                                latlng = new google.maps.LatLng(parseFloat($x),parseFloat  ($y));
                                                
                                                infowindowContent.children['place-name'].textContent = "Vị trí hiện tại của tài xế ";
                                                infowindow.open(map,marker);
                                                marker.setPosition(latlng);
                                                marker.setVisible(true);
                                                map.setCenter(latlng);
                                            }});
                                            
                                                    
                                               


                                        });
                                        $("#sendplace").click(function() {

                                           
                                            $('#map-container').css('display', 'block');
                                            $("#pac-input").val("");
                                            $("#pac-input").focus();
                                            google.maps.event.trigger(map, 'resize');
                                            
                                            $.ajax({
                                            url: "/ajax/location_update", 
                                            type:"GET",
                                            dataType:'json',
                                            data: {
                                                id: a,

                                            },
                                            success: function(result){
                                                //delete all child

                                                $x= result['lat'];
                                                $y= result['lng'];
                                                latlng = new google.maps.LatLng(parseFloat($x),parseFloat  ($y));
                                                
                                                infowindowContent.children['place-name'].textContent = "Vị trí hiện tại của tài xế ";
                                                infowindow.open(map,marker);
                                                marker.setPosition(latlng);
                                                marker.setVisible(true);
                                                map.setCenter(latlng);
                                            }});
                                        });

                                        $("#close").click(function() {
                                            $('#map-container').css('display', 'none');
                                        });
                                        </script>
@endsection
<!-- js -->

<!-- //here ends scrolling icon -->