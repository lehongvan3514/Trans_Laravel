<!-- Modal2 -->
<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="signin-form profile">
                    <div class="login-form">
                        <h5>Need To <span>Transport</span>?</h5>
                        <p>Ut enim ad minima veniam, quis nostrum exerc ullam corporis nisi ut aliqui</p>
                        <form action="guest_product" method="post">
                            {{ csrf_field() }}
                            <input type="text" class="email" name="name" placeholder="Name" required="">
                            <input type="tel" class="tel" name="tel" placeholder="Phone Number" required="">
                            <input type="tel" class="weight" name="weight" placeholder="Khối lượng" required="">
                            <input type="date" style="width: 100%;" name="thoi_gian" required="">
                            <select name="xuat_phat" class="form-control option-w3ls">
                                <option>Vận Chuyển từ</option>
                                @include('layouts.diadiem')
                            </select>
                            <input type="text" name="xuat_phat_details" placeholder="Địa chỉ cụ thể" id="popup1" required=""> @include('layouts.map')
                            <script>
                            $("#popup1").click(function() {

                                $('#map-container').css('display', 'block');
                                google.maps.event.trigger(map, 'resize');
                                map.setCenter(latlng);
                                
                            });
                            $("#close").click(function() {
                                $('#map-container').css('display', 'none');
                            });
                            $("#sendplace").click(function() {

                                $('#popup1').val(address);
                                $('#close').click();
                            });
                            </script>
                            <select name="dich_den" class="form-control option-w3ls">
                                <option>Vận chuyển tới</option>
                                @include('layouts.diadiem')
                            </select>
                            <input type="text" name="dich_den_details" placeholder="Địa chỉ cụ thể" required=""> @if (Session::has('guest_thanhcong'))
                            <div class="alert alert-success">{!! Session::get('guest_thanhcong') !!}</div>
                            @endif @include('layouts.errors')
                            <button class="submit-b" type="submit">Get Started</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Modal2 -->