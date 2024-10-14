<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\City;
use App\Models\District;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
session_start();


class CheckoutController extends Controller
{
    public function login_checkout(){
        $category = DB::table('category')->select('CatID','CatName')->get(); 
        $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); 
        $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); 
      return view('User.CheckOut.login_checkout', compact('category','featured','bestsell'));

    }
    public function logout_checkout() {
      // Xóa toàn bộ dữ liệu trong session
      Session::flush();
      // Chuyển hướng đến trang đăng nhập
      return Redirect::to('/login_checkout');
    }
    public function login_customer(Request $request) {
      $email = $request->input('email_account');
      $password = $request->input('password_account');
      $result = DB::table('customers')->where('CusEmail',$email)->orwhere('CusPassword',$password)->first();
      if($result){
      Session::put('CusName',$result->CusName);
      Session::put('CusID',$result->CusID);
      return Redirect::to('/checkout');
      }else{
        Session::put('message','Vui long kiem tra lai thong tin dang nhap');
        return Redirect::to('/login_checkout');
      }
  }
   
    public function add_customer(Request $request){
        $data = array();
        $data ['CusName'] = $request->cus_name;
        $data ['CusPhone'] = $request->cus_phone;
        $data ['CusEmail'] = $request->cus_email;
        $data ['CusPassword'] = $request->cus_password;
      // Chèn khách hàng vào cơ sở dữ liệu và lấy ID của khách hàng được chèn
      $customer_id = DB::table('customers')->insertGetId($data);
      // Lưu ID của khách hàng vào session
      Session::put('CusID',$customer_id);
      // Lưu tên của khách hàng vào session
      Session::put('CusName', $request->cus_name);
      return Redirect::to('/checkout');
    }
    public function checkout(){
      $category = DB::table('category')->select('CatID','CatName')->get(); 
      $featured = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Hàng mới về')->get(); 
      $bestsell = DB::table('product1')->select('ProID', 'ProName', 'ProImage', 'Cost')->where('Displayhome', '=', 'Bán chạy')->get(); 
      $cities = City::orderBy('CityID', 'ASC')->get();
      return view('User.CheckOut.checkout', compact('category','featured','bestsell','cities'));
      
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data ['ShipName'] = $request->shipping_name;
        $data ['ShipAddress'] = $request->shipping_address;
        $data ['ShipPhone'] = $request->shipping_phone;
        $data ['ShipEmail'] = $request->shipping_email;
        $data ['ShipNote'] = $request->shipping_note;
      // Chèn thông tin khách hàng vào cơ sở dữ liệu và lấy ID thông tin của khách hàng được chèn
      $shipping_id = DB::table('shipping')->insertGetId($data);
      // Lưu ID thông tin của khách hàng vào session
      Session::put('ShipID',$shipping_id);
      return Redirect::to('/payment');
    }
    public function payment(){
      return view('User.CheckOut.payment');
    }
    public function cash(){
      return view('User.CheckOut.cash');
    }
    public function order_place(Request $request){
      //insert payment_method
        $method_data = array();
        $method_data ['Payment_method'] = $request->payment_option;
        $method_data ['Payment_status'] ='Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId( $method_data);
     //insert order
        $order_data = array();
        $order_data ['CusID'] = Session::get('CusID');
        $order_data ['ShipID'] = Session::get('ShipID');
        $order_data ['Payment_ID'] = $payment_id;
        $order_data ['Order_total'] = Cart::subtotal();
        $order_data ['Order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insertGetId($order_data);
      //insert order_details
      $content =  Cart::content();
      foreach($content as $sp ){
        $order_details = array();
        $order_details['OrderID'] =  $order_id;
        $order_details ['ProID'] = $sp->id;
        $order_details ['ProName'] = $sp->name;
        $order_details ['Cost'] = $sp->price;
        $order_details ['Pro_sales_quantity'] = $sp->qty;
        DB::table('order_details')->insert($order_details);
      }
      if($method_data ['Payment_method'] ==1){
        echo 'Thẻ tín dụng/Ghi nợ';
      }elseif($method_data ['Payment_method'] ==2){
        Cart::destroy();
        return view('User.CheckOut.cash');      //thanh toán khi nhận hàng

      }else{
        echo 'ApplePay';
      }
    
      // return Redirect::to('/payment');
    }
    public function select_delivery_checkout(Request $request){
      $data = $request->all();
      $output = '';
      if ($data['action']) {
          if ($data['action'] == 'city') {
              $districts = District::where('CityID', $data['ma_id'])->orderBy('DistrictID', 'ASC')->get();
              $output .= '<option value="">--Chọn quận/huyện--</option>';
              foreach ($districts as $district) {
                  $output .= '<option value="' . $district->DistrictID . '">' . $district->DistrictName . '</option>';
              }
          } else {
              $wards = Wards::where('DistrictID', $data['ma_id'])->orderBy('WardsID', 'ASC')->get();
              $output .= '<option value="">--Chọn phường/xã--</option>';
              foreach ($wards as $ward) {
                  $output .= '<option value="' . $ward->WardsID . '">' . $ward->WardsName . '</option>';
              }
          }
      }
      return response()->json($output);
  }
  public function calculate_fee(Request $request){
    $data = $request->all();
    if ($data['city_id']){
        $fee_ship = Feeship::where('Fee_CityID',$data['city_id'])->where('Fee_DistrictID',$data['district_id'])->where('Fee_WardsID',$data['wards_id'])->get();
        if($fee_ship){
          $count_feeship = $fee_ship->count();
            if($count_feeship > 0){
                foreach($fee_ship as $fee){
                Session::put('fee', $fee->Fee_Ship);
                Session::save();
              }
            }else{
                Session::put('fee',30000);
                Session::save();
            }
        }
      }
  }
  public function delete_fee()
    {
        // Xóa phí vận chuyển từ session
        Session::forget('fee');

        // Chuyển hướng người dùng trở lại trang trước đó
        return Redirect()->back();
    }
    public function confirm_order(Request $request){
      $data = $request->all();
      //shipping
      $shipping = new Shipping();
      $shipping->ShipName = $data['shipping_name'];
      $shipping->ShipPhone = $data['shipping_phone'];
      $shipping->ShipEmail = $data['shipping_email'];
      $shipping->ShipAddress = $data['shipping_address'];
      $shipping->ShipNote = $data['shipping_note'];
      $shipping->ShipMethod = $data['shipping_method'];
      $shipping->save();
      //order
      $shipping_id =$shipping->ShipID;

      $checkout_code = substr(md5(microtime()),rand(0,26),5);
      $order = new Order();
      $order->CusID = Session::get('CusID');
      $order->ShipID = $shipping_id;
      $order->Order_status = 1;
      $order->Order_code = $checkout_code;
      $order->save();
      //order details
     
      // Lấy nội dung giỏ hàng
      $content = Cart::content();
      if ($content) {
        // Process the content
        } else {
            // Log or handle the empty cart case
            error_log('Cart is empty');
            return redirect()->back()->with('error', 'Cart is empty.');
        }
           foreach ($content as $sp) {
        // Tạo đối tượng chi tiết đơn hàng mới
        $order_details = new OrderDetails();
        $order_details->Order_code = $checkout_code;
        $order_details->ProID = $sp->id;
        $order_details->ProName = $sp->name;
        $order_details->Cost = $sp->price;
        $order_details->Pro_sales_quantity = $sp->qty;
        $order_details->Product_feeship = isset($data['order_fee']) ? $data['order_fee'] : 0; // Đảm bảo order_fee tồn tại
        // Lưu chi tiết đơn hàng vào cơ sở dữ liệu
        $order_details->save();
    }
  // }
  }
  
}