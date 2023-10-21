<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Membershippackage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cart()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại

        // Lấy giỏ hàng của người dùng
        $cart = $user->carts->where('status', 1)->first(); // Đã đặt hàng nhưng chưa thanh toán

        return view('cart', [
            'cart' => $cart
        ]);
    }

    // public function checkout()
    // {
    //     $user = Auth::user();
    //     $cart = $user->carts->where('status', 1)->first();

    //     return view('checkout', compact('cart'));
    // }
    public function addToCart($id, $quantity)
    {
        $user = Auth::user();
        $package = MembershipPackage::find($id);

        // Tạo hoặc lấy giỏ hàng của người dùng
        $cart = $user->carts->where('status', 1)->first();

        if ($cart === null) {
            // Nếu không có giỏ hàng, tạo một giỏ hàng mới
            $cart = new Cart(['cart_total' => 0, 'cart_date' => now(), 'status' => 1]);
            $user->carts()->save($cart);
        }

        // Lưu trạng thái của giá trị giỏ hàng trước khi thêm sản phẩm mới
        $previousCartTotal = $cart->cart_total;

        // Kiểm tra xem giỏ hàng đã có cartDetails chưa
        if ($cart->cartDetails()->count() > 0) {
            // Lưu lại giá trị của cartDetails trước khi xóa
            $previousCartDetailsTotal = $cart->cartDetails->sum('price');
            // Xóa tất cả cartDetails hiện có
            $cart->cartDetails()->delete();
        } else {
            $previousCartDetailsTotal = 0;
        }

        // Tạo chi tiết giỏ hàng mới
        $cartDetail = new CartDetail([
            'quantity' => $quantity,
            'price' => $package->price,
        ]);

        // Kết nối gói học với chi tiết giỏ hàng
        $cartDetail->package_id = $package->id;

        // Thêm chi tiết giỏ hàng vào giỏ hàng của người dùng
        $cart->cartDetails()->save($cartDetail);

        // Cập nhật tổng giá trị giỏ hàng chỉ với giá trị mới
        $cart->cart_total = $previousCartTotal - $previousCartDetailsTotal + ($package->price * $quantity);
        $cart->save();

        return redirect()->route('cart');
    }

    public function removeCart($id)
    {
        $cartDetail = CartDetail::find($id);

        if ($cartDetail) {
            // Xóa cart_detail
            $cartDetail->delete();

            // Kiểm tra xem còn bao nhiêu cart_details trong cart
            $cart = $cartDetail->cart;
            $remainingCartDetails = $cart->cartDetails;

            // Nếu không còn cart_details nào, xóa cả cart
            if ($remainingCartDetails->isEmpty()) {
                $cart->delete();
            }
        }

        return redirect()->route('cart');
    }

    // THANH TOÁN TÍCH HỢP MOMO
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán gói đăng ký thành viên KIDS ZONE qua ATM MoMo";
        $amount = $_POST['amount'];
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/cart";
        $ipnUrl = "http://127.0.0.1:8000/cart";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        // dd($signature);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); // decode json


        if ($jsonResult['resultCode'] == 0) {
            // Thanh toán thành công
            $account = Auth::user(); // Sử dụng tài khoản hiện tại của người dùng
            $cart = $account->carts->where('status', 1)->first();

            if ($cart) {
                $cart->status = 2;
                $cart->save();

                foreach ($cart->cartDetails as $cartDetail) {
                    $packageId = $cartDetail->package_id;

                    // Cập nhật package_id bằng cách sử dụng DB facade
                    DB::table('accounts')
                        ->where('id', $account->id)
                        ->update(['package_id' => $packageId]);
                }

                // $cart->cartDetails()->delete();
            }

            return redirect()->to($jsonResult['payUrl']);
        } else {
            return redirect()->back()->with('error', 'Thanh toán không thành công. Vui lòng thử lại.');
        }
    }
}