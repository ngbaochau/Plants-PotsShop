@extends('Admin.home')
@section('(content)')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Thông tin tài khoản khách hàng
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Search</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }   
                ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
              {{-- <th>Địa chỉ</th> --}}
              <th>Thao tác</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  
                  <td>{{ $order_by_id->CusName}}</td>
                  <td>{{ $order_by_id->CusPhone}}</td>
                
                  <td>
                      <a href="" class="active " ui-toggle-class="">
                          <i class=" fa fa-pencil-square-o" aria-hidden="true" style="size:200px"></i>
                      </a>
                      <a href="" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')" class="active" ui-toggle-class="">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
           

            </tbody>
        </table>
        </div>
    </div>
</div>
<br><br>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin vận chuyển đơn hàng
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Search</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }   
                ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              
              <th>Tên người nhận</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Thao tác</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
          
              <tr>
                  <td>{{ $order_by_id->ShipName}}</td>
                  <td>{{ $order_by_id->ShipAddress}}</td>
                  <td>{{ $order_by_id->ShipPhone}}</td>
                  <td>
                      <a href="" class="active " ui-toggle-class="">
                          <i class=" fa fa-pencil-square-o" aria-hidden="true" style="size:200px"></i>
                      </a>
                      <a href="" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')" class="active" ui-toggle-class="">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
           

            </tbody>
        </table>
        </div>
        
    </div>
</div>
<br><br>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách chi tiết đơn hàng
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Search</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }   
                ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng tiền</th>
              <th>Thao tác</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
          
              <tr>
                  <td>{{ $order_by_id->ProName}}</td>
                  <td>{{ $order_by_id->Pro_sales_quantity}}</td>
                  <td>{{ $order_by_id->Cost}}</td>
                  <td>{{ $order_by_id->Order_total}}</td>
                  <td>
                      <a href="" class="active " ui-toggle-class="">
                          <i class=" fa fa-pencil-square-o" aria-hidden="true" style="size:200px"></i>
                      </a>
                      <a href="" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')" class="active" ui-toggle-class="">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
           

            </tbody>
        </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
            
            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">Xem thêm</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
            </div>
      </footer>
    </div>
</div>
  @endsection