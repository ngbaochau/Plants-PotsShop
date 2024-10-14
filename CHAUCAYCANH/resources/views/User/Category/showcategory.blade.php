@extends('index')
@section('content')
    <div class="features_items"><!--features_items-->
        @foreach($catName  as $name)
        <h2 class="title text-center">{{ $name->CatName }}</h2>
        @endforeach
        @foreach($catID  as $sp)
        <a href="{{ URL::to('/chitietsanpham/'.$sp->ProID) }}"> 
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                        <img src="{{ URL::to('./Admin/uploads/product/'.$sp->ProImage)}}" alt="" />
                                        <h2>{{number_format($sp->Cost) }} đ</h2>
                                        <p>{{ $sp->ProName }}</p>
                                    <a href="#" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                </div>
                        </div>
                    
                </div>
            
            </div>
        </a>
        @endforeach
    </div> 
@endsection