@extends('Admin.home')
@section('(content)')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách nhà cung cấp
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
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên nhà cung cấp</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($allbrand as $brand)
              <tr>
                  <td>
                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                  </td>
                  <td>{{ $brand->BrName }}</td>
                  <td><span class="text-ellipsis">
                    @if ($brand->Status == 0)
                        <a href="{{ URL::to('/unactive_brand/'.$brand->BrID) }}">
                            <span class="fa-eye-styling fa fa-eye-slash"></span>
                        </a>
                    @else
                        <a href="{{ URL::to('/active_brand/'.$brand->BrID) }}">
                            <span class="fa-eye-styling fa fa-eye"></span>
                        </a>
                    @endif
                
                  </span></td>
                  <td>
                      <a href="{{ URL::to('/editbrand/'.$brand->BrID)}}" class="active " ui-toggle-class="">
                          <i class=" fa fa-pencil-square-o" aria-hidden="true" style="size:200px"></i>
                      </a>
                      <a href="{{ URL::to('/deletebrand/'.$brand->BrID)}}" onclick="return confirm('Bạn có muốn xóa danh mục này không?')" class="active" ui-toggle-class="">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach

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