@extends('Admin.home')
@section('(content)')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    THÊM SẢN PHẨM
                    
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
                        <form role="form" action="{{URL::to('/saveproduct')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >Tên sản phẩm</label>
                            <input type="text" name="name_product" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="5"  name="desc_product" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="5"  name="content_product" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cost_product">Giá</label>
                            <input type="text" name="cost_product" class="form-control" id="cost_product" placeholder="Nhập giá sản phẩm">
                        </div>
                        
                        <div class="form-group">
                            <label name="image_product"  for="exampleInputFile">Thêm ảnh</label>
                            <input  name="image_product"   type="file" id="exampleInputFile">
                        </div>
                        <div class="form-group">
                            <label name="moreimage_product" for="exampleInputFile">Thêm nhiều ảnh</label>
                            <input name="moreimage_product" type="file" id="exampleInputFile" multiple>
                        </div>
                        
                        <div class="form-group">
                            <label for="status_product">Trạng thái</label>
                            <select class="form-control input-sm m-bot15" name="status_product">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_product">Nhà cung cấp</label>
                            <select class="form-control input-sm m-bot15" name="brand_product">
                                @foreach (  $brand   as $key => $brand)
                                    <option value="{{ $brand->BrID }}">{{ $brand->BrName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cat_product">Loại sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="cat_product">
                                @foreach ( $catproduct  as $key => $cat)
                                    <option value="{{ $cat->CatID }}">{{ $cat->CatName }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label >Chất liệu</label>
                            <input type="text" name="materials_product" class="form-control" id="exampleInputEmail1" placeholder="Nhập chất liệu sản phẩm">
                        </div> --}}
                        <div class="form-group">
                            <label >Số lượng</label>
                            <input type="text" name="size_product" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng sản phẩm">
                        </div>
                        <div class="form-group">
                            <label >Tình trạng</label>
                            <input type="text" name="display_product" class="form-control" id="exampleInputEmail1" placeholder="Nhập tình trạng sản phẩm">
                        </div>
                        <button name="add_product" type="submit" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection