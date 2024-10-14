@extends('Admin.home')
@section('(content)')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    SỬA SẢN PHẨM
                    
                </header>
                 <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }   
                ?>
                <div class="panel-body">           
                    @foreach ($editproduct as $key => $edit_value)     
                        <div class="position-center">
                            
                            <form role="form" action="{{URL::to('/updateproduct/'.$edit_value->ProID)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label >Tên sản phẩm</label>
                                    <input type="text" name="name_product" class="form-control" id="exampleInputEmail1"  value="{{$edit_value->ProName}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5"  name="desc_product" class="form-control" id="exampleInputPassword1">{{$edit_value->ProDescription}}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5"  name="content_product" class="form-control" id="exampleInputPassword1" >{{$edit_value->ProDescription}}</textarea>
                                </div>
                                <div class= "form-group">
                                    <label for="cost_product">Giá</label>
                                    <input type="text" name="cost_product" class="form-control" id="cost_product" value="{{$edit_value->Cost}}" >
                                </div>
                                
                                <div class="form-group">
                                    <label name="image_product"  for="exampleInputFile">Thêm ảnh</label>
                                    <input  name="image_product"   type="file" id="exampleInputFile">
                                    @if($edit_value->ProImage)
                                        <img src="{{ asset('Admin/uploads/product/'.$edit_value->ProImage) }}" alt="Ảnh sản phẩm" style="max-width: 100px; padding-top:10px">
                                    @endif
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
                                            @if( $brand->BrID==$edit_value->BrID)
                                                <option selected value="{{ $brand->BrID }}">{{ $brand->BrName }}</option>
                                            @else
                                                <option  value="{{ $brand->BrID }}">{{ $brand->BrName }}</option>
                                            @endif  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cat_product">Loại sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="cat_product">
                                        @foreach ( $catproduct  as $key => $cat)
                                            @if( $cat->CatID==$edit_value->CatID)
                                                <option selected  value="{{ $cat->CatID }}">{{ $cat->CatName }}</option>
                                            @else
                                                <option value="{{ $cat->CatID }}">{{ $cat->CatName }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label >Số lượng</label>
                                    <input type="text" name="size_product" class="form-control" id="exampleInputEmail1" value="{{$edit_value->Quantity}}">
                                </div>
                                <div class="form-group">
                                    <label >Tình trạng</label>
                                    <input type="text" name="display_product" class="form-control" id="exampleInputEmail1" value="{{$edit_value->Displayhome}}">
                                </div>
                                <button name="add_product" type="submit" class="btn btn-info">SỬA</button>
                               
                            </form>
                        </div>
                    @endforeach
                    
                </div>
                
            </section>
    </div>
    
</div>
@endsection