 <!-- SIDEBAR USERPIC -->
 <link href="/assets/css/bootsnipp.css" rel="stylesheet">
<div class="profile-userpic">
    <img src="/assets/images/profile/475a4d05e465a87de2bdf4a0332216afaa9eafc4.jpg" class="img-responsive" alt="">
</div>
<!-- END SIDEBAR USERPIC -->
<!-- SIDEBAR USER TITLE -->
<div class="profile-usertitle">
    <div class="profile-usertitle-name">
        {{Auth::user()->name}}
    </div>
    <div class="profile-usertitle-job">
        @if (Auth::user()->role =='1') 
          Quản lý
        @elseif (Auth::user()->role =='2')
          Tài xế
        @else (Auth::user()->role =='3') 
          Khách hàng
        @endif
    </div>
</div>
<!-- END SIDEBAR USER TITLE -->

