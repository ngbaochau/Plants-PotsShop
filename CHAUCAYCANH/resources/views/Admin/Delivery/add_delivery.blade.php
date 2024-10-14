@extends('Admin.home')
@section('(content)')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm phí vận chuyển 
            </header>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="panel-body">
                <div class="position-center">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="city">Chọn tỉnh thành</label>
                            <select class="form-control input-sm m-bot15 choose city" name="city_id" id="city">
                                <option value="">--Chọn tỉnh thành--</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->CityID }}">{{ $city->CityName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district">Chọn quận/huyện</label>
                            <select class="form-control input-sm m-bot15 choose district" name="district_id" id="district">
                                <option value="">--Chọn quận/huyện--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ward">Chọn phường/xã</label>
                            <select class="form-control input-sm m-bot15 choose wards" name="ward_id" id="ward">
                                <option value="">--Chọn phường/xã--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fee_ship">Phí vận chuyển</label>
                            <input type="text" name="fee_ship" class="form-control fee_ship" id="fee_ship" placeholder="Nhập phí vận chuyển">
                        </div>
                        <button type="button" class="btn btn-info add_delivery">THÊM PHÍ VẬN CHUYỂN</button>
                    </form>
                    
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.choose').on('change', function(){
                                var action = $(this).attr('id');
                                var ma_id = $(this).val();
                                var _token = $('input[name="_token"]').val();
                                var result = '';

                                if(action == 'city'){
                                    result = 'district';
                                } else if(action == 'district'){
                                    result = 'ward';
                                }

                                $.ajax({
                                    url: '{{ url("/select_delivery") }}',
                                    method: 'POST',
                                    data: { action: action, ma_id: ma_id, _token: _token },
                                    success: function(data){
                                        $('#' + result).html(data);
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText);
                                        alert('Có lỗi xảy ra khi tải dữ liệu. Vui lòng thử lại sau.');
                                    }
                                });
                            });

                            $('.add_delivery').click(function(){
                                var city = $('.city').val();
                                var district = $('.district').val();
                                var ward = $('.wards').val();
                                var fee_ship = $('.fee_ship').val();
                                var _token = $('input[name="_token"]').val();

                                if(city == '' || district == '' || ward == '' || fee_ship == ''){
                                    alert('Vui lòng nhập đầy đủ thông tin');
                                    return;
                                }

                                $.ajax({
                                    url: '{{ url("/insert_delivery") }}',
                                    method: 'POST',
                                    data: { city: city, district: district, ward: ward, fee_ship: fee_ship, _token: _token },
                                    success: function(response){
                                        alert(response.message);
                                        fetch_delivery();
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText);
                                        alert('Có lỗi xảy ra khi thêm phí vận chuyển. Vui lòng thử lại sau.');
                                    }
                                });
                            });
                            function fetch_delivery() {
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: '{{ url("/select_feeship") }}',
                                        method: 'POST',
                                        data: { _token: _token },
                                        success: function(data) {
                                            $('#load_delivery').html(data);
                                        },
                                        error: function(xhr, status, error) {
                                            console.log(xhr.responseText);
                                            alert('Có lỗi xảy ra khi tải phí vận chuyển. Vui lòng thử lại sau.');
                                        }
                                    });
                                }

                                // Initial load
                                fetch_delivery();
                            });
                            $(document).on('blur', '.Fee_Ship_edit', function() {
                                var feeship_id = $(this).data('feeship_id');
                                var fee_value = $(this).text();
                                var _token = $('input[name="_token"]').val();

                                $.ajax({
                                    url: '{{ url("/update_delivery") }}',
                                    method: 'POST',
                                    data: { feeship_id: feeship_id, fee_value: fee_value, _token: _token },
                                    success: function(data) {
                                        alert('Cập nhật phí vận chuyển thành công');
                                        fetch_delivery(); // Refresh the delivery list after updating
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText);
                                        alert('Có lỗi xảy ra khi sửa phí vận chuyển. Vui lòng thử lại sau.');
                                    }
                                });
                            });

                    </script>
                </div>
                <div id ="load_delivery"></div>
            </div>
        </section>
    </div>
</div>
@endsection