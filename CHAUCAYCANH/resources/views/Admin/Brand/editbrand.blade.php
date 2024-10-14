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
                    @foreach ($editbrand as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/updatebrand/'.$edit_value->BrID)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên danh mục</label>
                                <input type="text" value="{{$edit_value->BrName}}" name="name_brand" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên nhà cung cấp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea style="resize: none" rows="5"  name="desc_brand" class="form-control" id="exampleInputPassword1" > {{$edit_value->BrDescription}}</textarea>
                            </div>
                           
                            
                            <button name="update_brand" type="submit" class="btn btn-info">Sửa</button>
                        </form>
                        </div>
                    @endforeach
                </div>
            </section>
    </div>
    
</div>
@endsection