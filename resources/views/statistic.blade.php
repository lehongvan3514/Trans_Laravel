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
                                    <li >
                                        <a href="/statistic">
                                        <i class="glyphicon glyphicon-user"></i>
                                        Thống kê kinh doanh </a>
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
                                  Thống kê kinh doanh tháng 
                                <?php 
                                $mytime = Carbon\Carbon::now();
echo $mytime->month; ?> - <?php echo $mytime->year ?>
                               </legend>
                               <div class="demo1">
                                   <form class="form-horizontal">
                                       <div >
                                           <div class="form-group">
                                               <label class="col-lg-4 text-bold">
                                                   Số đơn hàng đã hoàn thành
                                               </label> 
                                               <div class="col-lg-8">
                                                   <span id="complete"> {{Auth::user()->email}}</span>
                                                   <span id="not_complete"> {{Auth::user()->email}}</span>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label class="col-lg-4 text-bold">
                                                   Khoản thu
                                               </label> 
                                               <div class="col-lg-8">
                                                   <span id="money"> {{Auth::user()->name}}</span>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label class="col-lg-4 text-bold">
                                                   Khoản chưa thu
                                               </label> 
                                               <div class="col-lg-8">
                                                   <span id="not_money"> {{Auth::user()->name}}</span>
                                               </div>
                                           </div>
                                           <div class="form-group col-lg-8" style="display: block;">
                                               <a href="#" id="btn_thongke" class="van-button-link">Hiện/Ẩn thống kê năm 2017</a>
                                               <a href="/ajax/excel?month=11&year=2017" id="btn_excel" class="van-button-link">Xuất file excel</a>
                                           </div>
                                       </div>
                                       
                                   </form>
                               </div>
                              
                           </fieldset>
                           <div class="app" style="display: block;">
					            <center>
					                {!! $chart->html() !!}
					            </center>
					        </div>
					        <!-- End Of Main Application -->

					        {!! Charts::scripts() !!}
       						{!! $chart->script() !!}
       						
                        <fieldset id="field">
                            <legend class="text-semibold">
                                Thống kê kinh doanh tháng 
                                <?php 
                                $mytime = Carbon\Carbon::now();
echo $mytime->month; ?> - <?php echo $mytime->year ?>
                            </legend>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    	<th>STT</th>
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày giao hàng</th>
                                        <th>Nơi lấy hàng</th>
                                        <th>Đích đến</th>
                                        <th>Khối lượng</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    	<th>STT</th>
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày giao hàng</th>
                                        <th>Nơi lấy hàng</th>
                                        <th>Đích đến</th>
                                        <th>Khối lượng</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                    @foreach ($products as $product)
                                    <tr>
                                    	<td>id</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->tel}}</td>
                                        <td>{{$product->ngay_giao_hang}}</td>
                                        <td>{{$product->xuat_phat_details}}</td>
                                        <td>{{$product->dich_den_details}}</td>
                                        <td>{{$product->weight}}</td>
                                        <td>@if ($product->trang_thai == 0) Đang chờ xác nhận @elseif ($product->trang_thai ==1) Đang chờ tài xế lấy hàng @elseif ($product->trang_thai ==2) Đang lấy hàng @elseif ($product->trang_thai ==3)  Hàng ở kho @elseif ($product->trang_thai ==4) Đang chờ chuyển cho khách hàng @elseif ($product->trang_thai ==5) Đang giao hàng @elseif ($product->trang_thai ==6) Đơn hàng hoàn thành @endif</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </fieldset>
                        @if (Session::has('guest_thanhcong'))
                        <div class="alert alert-success">{!! Session::get('guest_thanhcong') !!}</div>
                        @endif @include('layouts.errors')
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

<script>
  $(document).ready(function() {
  	$('.app').css('display', 'none');
  	$("#btn_thongke").click(function(){
  		if($('.app').css('display') == 'none')
		{
			$('.app').css('display', 'block');
  			eval($(".charts-chart").children().attr("id")).reflow();
		}
  		else{
  			$('.app').css('display', 'none');
  		}
  		
  	});
    /*$("#btn_thongke").click(function(){
        $.ajax({
        url: "/ajax/excel", 
        type:"GET",
        data:{
            month:11,
            year:{{$mytime->year}}
        },
        dataType:'json',
        success: function(result){
            //delete all child;
            }});

        
    });*/
  	const numberWithCommas = (x) => {
	  var parts = x.toString().split(".");
	  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	  return parts.join(".");
	}
  	$.ajax({
        url: "/ajax/statistic", 
        type:"GET",
        data:{
        	month:11,
        	year:{{$mytime->year}}
        },
        dataType:'json',
        success: function(result){
            //delete all child

            //$("#tbody").empty();
            $("#example").remove();
            $("#field").html('<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">');
            var table = $("#example").html('<thead><tr><th>STT</th><th>Tên</th> <th>Số điện thoại</th><th>Ngày giao hàng</th><th>Nơi lấy hàng</th><th>Đích đến</th><th>Khối lượng</th><th>Trạng thái</th></tr></thead><tfoot><tr><th>STT</th><th>Tên</th><th>Số điện thoại</th><th>Ngày giao hàng</th><th>Nơi lấy hàng</th><th>Đích đến</th><th>Khối lượng</th><th>Trạng thái</th></tr></tfoot><tbody id="tbody"></tbody>');
            var count=0;
            var count_done=0;
            var money =0;
            var not_money=0;
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
                if (val['trang_thai']==6){
                	count_done = count_done+1;
                	money = money + val['weight'];
                }
                else{
                	not_money = not_money + val['weight'];
                }
                count=count+1;
                $test = "<tr id='"+val['id'] +"'><td>"+(i+1)+"</td><td>"+val['name']+"</td><td>"+val['tel']+"</td><td>"+val['ngay_giao_hang']+"</td><td>"+val['xuat_phat_details']+"</td><td>"+val['dich_den_details']+"</td><td>"+val['weight']+"</td><td>"+$a+"</td></tr>"
                    $("#tbody").append($test);
                });
            $("#complete").html(count_done);
            $("#not_complete").html("/"+count);
            $("#money").html(numberWithCommas(money*2)+".000 VND");
            $("#not_money").html(numberWithCommas(not_money*2)+".000 VND");
            
            $("#example").DataTable();
            }});

    var myInterval= setInterval(load_ajax, 10080);
    function load_ajax(){
        $.ajax({
        url: "/ajax/statistic", 
        type:"GET",
        data:{
        	month:11,
        	year:{{$mytime->year}}
        },
        dataType:'json',
        success: function(result){
            //delete all child

            //$("#tbody").empty();
            $("#example").remove();
            $("#field").html('<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">');
            var table = $("#example").html('<thead><tr><th>STT</th><th>Tên</th> <th>Số điện thoại</th><th>Ngày giao hàng</th><th>Nơi lấy hàng</th><th>Đích đến</th><th>Khối lượng</th><th>Trạng thái</th></tr></thead><tfoot><tr><th>STT</th><th>Tên</th><th>Số điện thoại</th><th>Ngày giao hàng</th><th>Nơi lấy hàng</th><th>Đích đến</th><th>Khối lượng</th><th>Trạng thái</th></tr></tfoot><tbody id="tbody"></tbody>');
            var count=0;
            var count_done=0;
            var money = 0;
            var not_money=0;
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
                if (val['trang_thai']==6){
                	count_done = count_done+1;
                	money = money + val['weight'];
                }else{
                	not_money = not_money + val['weight'];
                }
                count=count+1;
                $test = "<tr id='"+val['id'] +"'><td>"+(i+1)+"</td><td>"+val['name']+"</td><td>"+val['tel']+"</td><td>"+val['ngay_giao_hang']+"</td><td>"+val['xuat_phat_details']+"</td><td>"+val['dich_den_details']+"</td><td>"+val['weight']+"</td><td>"+$a+"</td></tr>"
                    $("#tbody").append($test);
                });
            $("#complete").html(count_done);
            $("#not_complete").html("/"+count);
            $("#money").html(numberWithCommas(money*2)+".000 VND");
            $("#not_money").html(numberWithCommas(not_money*2)+".000 VND");
            $("#example").DataTable();
            }});
    };
    
});
</script>
@endsection
<!-- js -->
<!-- //here ends scrolling icon -->