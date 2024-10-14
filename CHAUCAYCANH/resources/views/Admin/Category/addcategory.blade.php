@extends('Admin.home')
@section('(content)')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục 
                    
                </header>
                 <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }   
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/savecategory')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label >Tên danh mục</label>
                            <input type="text" name="name_category" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none" rows="5"  name="desc_category" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục" ></textarea>
                        </div>
                        <div class="form-group">
                            <label name="image_category"  for="exampleInputFile">Thêm ảnh</label>
                            <input  name="image_category"   type="file" id="exampleInputFile">
                        </div>
                        <div class="form-group">
                            <label for="status_category">Trạng thái</label>
                            <select class="form-control input-sm m-bot15" name="status_category">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        
                        
                        <button name="add_category" type="submit" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection