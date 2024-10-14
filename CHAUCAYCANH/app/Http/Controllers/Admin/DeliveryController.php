<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\City;
use App\Models\District;
use App\Models\Wards;
use App\Models\Feeship;
session_start();
class DeliveryController extends Controller
{
    public function delivery(Request $request) {
        $cities = City::orderBy('CityID', 'ASC')->get();
        return view('Admin.Delivery.add_delivery', compact('cities'));
    }

    public function select_delivery(Request $request) {
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

    public function insert_delivery(Request $request) {
        $data = $request->all();
        $feeShip = new Feeship();
        $feeShip->Fee_CityID = $data['city'];
        $feeShip->Fee_DistrictID = $data['district'];
        $feeShip->Fee_WardsID = $data['ward'];
        $feeShip->Fee_Ship = $data['fee_ship'];
        $feeShip->save();

        return response()->json(['message' => 'Thêm phí vận chuyển thành công']);
    }
    public function select_feeship() {
        $feeship = Feeship::with(['city', 'district', 'wards'])->orderBy('Fee_ID', 'DESC')->get();
        $output = '';
    
        $output .= '
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên thành phố</th>
                            <th>Tên quận/huyện</th>
                            <th>Tên phường/xã</th>
                            <th>Phí ship</th>
                        </tr>
                    </thead>
                    <tbody>
        ';
    
        foreach ($feeship as $fee) {
            $output .= '
                <tr>
                    <td>' . $fee->city->CityName . '</td>
                    <td>' . $fee->district->DistrictName . '</td>
                    <td>' . $fee->wards->WardsName . '</td>
                    <td contenteditable data-feeship_id="' . $fee->Fee_ID . '" class="Fee_Ship_edit" >' . number_format($fee->Fee_Ship, 0, ',', '.') . ' </td>
                </tr>
            ';
        }
    
        $output .= '
                    </tbody>
                </table>
            </div>
        ';
    
        return response($output);
    }
    public function update_delivery(Request $request){
        $feeship_id = $request->input('feeship_id');
        $fee_value = $request->input('fee_value');
        $fee_value = str_replace('.', '', $fee_value);
        $feeship = Feeship::find($feeship_id);
        if ($feeship) {
            $feeship->Fee_Ship = $fee_value;
            $feeship->save();
    
            return response()->json(['success' => 'Cập nhật phí vận chuyển thành công']);
        } else {
            return response()->json(['error' => 'Không tìm thấy phí vận chuyển'], 404);
        }
    }
    


}
