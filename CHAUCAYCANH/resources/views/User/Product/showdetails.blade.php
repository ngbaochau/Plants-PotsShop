@extends('index')
@section('content')
@foreach ($detailsproduct as $item) 
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" />
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                    {{-- <div class="carousel-inner">
                        <div class="item active">
                        <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                        <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                        <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                            <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                            <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                            <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                            <a href=""><img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" /></a>
                        </div>
                        
                    </div> --}}
                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-7">
    <!--/product-information-->
            <div class="product-information">
                {{-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> --}}
                <h2>{{ $item->ProName }}</h2>
                <p>{{ $item->ProDescription}}</p>
                <img src="images/product-details/rating.png" alt="" />
                <form action="{{ URL::to('/savecart/') }}" method="POST">
                    @csrf
                    <span>
                        <span>{{number_format($item->Cost) }} đ</span>             
                    </span>
                    <a href=""><img src="#" class="share img-responsive"  alt="" /></a>
                    <div id="buyamount" class="sluong">
                        <p>Số lượng:</p>
                        <button class="minusbtn" onclick="handleminus()">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                        <input type="text" name="soluong" id="amount" value="1">
                        <input type="hidden" name="proID_hidden" id="amount" value="{{ $item->ProID}}">
                        <button class="plusbtn" onclick="handleplus()">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                    <script>
                        let amountElement=document.getElementById('amount')
                        let amount=amountElement.value
                        // console.log(amount)
                        let render=(amount) =>{
                            amountElement.value=amount
                        }
                        //handle plus
                        let handleplus = () => {
                            amount++
                            render(amount);
                        }
                        //handle minus
                        let handleminus=() =>{
                            if (amount >1)
                                amount--
                            render(amount);
                        }
                        amountElement.addEventListener('input',()=>{
                            amount=amountElement.value;
                            amount=parseInt(amount);
                            amount=isNaN(amount)?1:amount;
                            amount=(isNaN(amount)||amount==0)?1:amount;
                            render(amount);
                            // console.log(amount)
                        })
                    </script>
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm vào giỏ hàng
                    </button>
                </form>
            </div>
        <!--/product-information-->
        </div>
    </div>
 
<!--/product-details-->
<!--category-tab-->
<div class="category-tab shop-details-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
            <li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
<!--mô tả sản phẩm-->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            <h2>Đôi nét về sản phẩm</h2> 
            <p>{{ $item->ProContent}}</p>
            <div style="text-align: center" >
                <img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" />
            </div>
        </div>
<!---đánh giá-->
        <div class="tab-pane fade " id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endforeach
<!--/category-tab-->
<!--recommended_items-->
<div class="recommended_items">
    <h2 class="title text-center">Sản phẩm tương tự</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
            @foreach ($similarproduct as $item)  
            <a href="{{ URL::to('/chitietsanpham/' .$item->ProID) }}"> 
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ URL::to('./Admin/uploads/product/'. $item->ProImage)}}" alt="" />
                                <h2>{{number_format($item->Cost) }} đ</h2>
                                <p><h2>{{ $item->ProName }}</h2></p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            </div>
            <div class="item">	
                @foreach ($similarproduct as $item)  
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ URL::to('./Admin/uploads/product/' . $item->ProImage)}}" alt="" />
                                <h2>{{number_format($item->Cost) }} đ</h2>
                                <p><h2>{{ $item->ProName }}</h2></p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
                
            </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div>
<!--/recommended_items-->
@endsection