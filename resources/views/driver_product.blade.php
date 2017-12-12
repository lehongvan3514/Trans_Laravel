@extends ('layouts.layout') @section ('content') @include ('layouts.modal1')
<!-- services -->
<div class="services two">
    <div class="container">
        <div class="container">
            <div class="row profile">
                <div class="col-md-3 ">
                    <div class="profile-sidebar" style="border: 1px solid #ddd; ">
                        @include ('layouts.side-bar-panel')
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="/driver">
                                        <i class="glyphicon glyphicon-home"></i>
                                        Tổng quan </a>
                                </li>
                            </ul>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
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
                                        <th>Khách hàng</th>
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
                                        <th>Khách hàng</th>
                                    </tr>
                                </tfoot>
                                <script>
                                var farx=0;
                                var idx;
                                var fard=0;
                                var idd;
                                </script>
                                <tbody id="tbody">
                                
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->tel}}</td>
                                        <td>{{$product->ngay_giao_hang}}</td>
                                        <td ><a id="{{$product->id}}x" href="#">{{$product->xuat_phat_details}}</a></td>

                                        <td ><a id="{{$product->id}}d" href="#">{{$product->dich_den_details}}</a></td>
                                        
                                        <td>
                                            @if ($product->trang_thai == 0) Đang chờ xác nhận @elseif ($product->trang_thai ==1) Đang chờ tài xế lấy hàng @elseif ($product->trang_thai ==2) Đang lấy hàng @elseif ($product->trang_thai ==3) Đang chờ chuyển cho khách hàng @elseif ($product->trang_thai ==4) Đang giao hàng @elseif ($product->trang_thai ==5) Đơn hàng hoàn thành @endif
                                        </td>
                                        <td>
                                             Đang chờ xác nhận 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </fieldset>
                        @include('layouts.map1s')
                        <!-- <a href="#" id="allx">Tìm đường ngắn nhất</a>
                        <script>
                        $("#allx").click(function() {
                            $('#map-container').css('display', 'block');
                        $("#pac-input").val("");
                        $("#pac-input").focus();
                        google.maps.event.trigger(map, 'resize');
                            var waypoints = [];
                        @foreach ($products as $product)
                            if ({{$product->id}}!=idd)
                                var address = {{$product->xuat_phat}};
                                waypoints.push({
                                        location: address,
                                        stopover: true
                                    });
                            }
                        @endforeach
                        });
                        
                        
                            
                            for (var i = 0; i < items.length; i++) {
                                var address = items[i];
                                if (address !== "") {
                                    waypoints.push({
                                        location: address,
                                        stopover: true
                                    });
                                }
                            }
                        </script> -->
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();

    setInterval(load_ajax, 600);
    function load_ajax(){
        $.ajax({
        url: "/ajax/driver_product", 
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
                        $a = "Đang lấy hàng";
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
                $test = "<tr><td>"+val['name']+"</td><td>"+val['tel']+"</td><td>"+val['ngay_giao_hang']+"</td><td><a id='"+val['id']+"x' href='#'>"+val['xuat_phat_details']+"</td><td><a id='"+val['id']+"d' href='#'>"+val['dich_den_details']+"</td><td>"+$a+"</td><td>Đang chờ xác nhận</td></tr>"
                    $("#tbody").append($test);
                });
            
            

    }});
    };
});
</script>
@include('layouts.map1')
@endsection
<!-- js -->
<!-- //here ends scrolling icon -->