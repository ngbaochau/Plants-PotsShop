@extends('Admin.home')
@section('(content)')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục 
                    
                </header>
                 <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }   
                ?>
                <div class="panel-body">
                    @foreach ($editcategory as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/updatecategory/'.$edit_value->CatID)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên danh mục</label>
                                <input type="text" value="{{$edit_value->CatName}}" name="name_category" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea style="resize: none" rows="5"  name="desc_category" class="form-control" id="exampleInputPassword1" > {{$edit_value->CatDescription}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thêm ảnh</label>
                                <input name="image_category" type="file" class="form-control-file" id="exampleInputFile">
                                @if($edit_value->CatImage)
                                    <img src="{{ asset('./uploads/'.$edit_value->CatImage) }}" alt="Ảnh danh mục" style="max-width: 100px; padding-top:10px">
                                @endif
                            </div>
                            
                            <button name="update_category" type="submit" class="btn btn-info">Sửa</button>
                        </form>
                        </div>
                    @endforeach
                </div>
            </section>
    </div>
    
</div>
@endsection