<?php

namespace App\Http\Controllers;

use App\Models\Datve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class thanhtoan extends Controller
{
    public function chuyentrang(Request $rq)
    {
        // return $rq;
        $vnp_TmnCode = "2XH56RMU";
        $vnp_HashSecret = "VE9PWYMLHTCYZ4AO3ET1Q34HCDKPAT9K";
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('/') . "/api/savethanhtoan";
        $vnp_TxnRef = $rq->order_id;
        $vnp_OrderInfo =  'Thanh toán vé du lịch ' . $rq->idve;
        $vnp_OrderType = 'Nạp tiền';
        $vnp_Amount = str_replace(',', '', $rq->money) * 100;
        // $vnp_Amount = $rq->money;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {

            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        //    header('Location: ' . $returnData['data']);
        return $returnData['data'];
    }
    public function savethanhtoan(Request $rq)
    {
        // return $rq;
        $vnp_HashSecret = "VE9PWYMLHTCYZ4AO3ET1Q34HCDKPAT9K";
        $vnp_SecureHash = $rq->vnp_SecureHash;
        $inputData = array();
        foreach ($rq->all() as $key => $value) {

            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }
        $secureHash = hash('sha256', $vnp_HashSecret . $hashData);
        $check = 0;
        if ($secureHash == $vnp_SecureHash) {
            if ($rq->vnp_ResponseCode == '00') {
                Datve::where('idve', $rq->vnp_TxnRef)->update(['trangthai_thanhtoan' => 1]);
            }
        }
        return view('thanhtoanthanhcong');
    }
}
//  Ngân hàng	NCB
//  Số thẻ	9704198526191432198
//  Tên chủ thẻ	NGUYEN VAN A
//  Ngày phát hành	07/15
//  Mật khẩu OTP	123456 