<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'gmail' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn!',
            'name.string' => 'Tên phải là chuổi ký tự!',
            'gmail.required' => 'Vui lòng nhập gmail!',
            'gmail.string' => 'Tên phải là chuổi ký tự!',
            'gmail.email' => 'Gmail không đúng định dạng!',
            'gmail.unique' => 'Gmail này đã được đăng ký!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.string' => 'Mật khẩu phải là chuổi ký tự!',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
        $user = new User([
            'name' => $request->name,
            'gmail' => $request->gmail,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gmail' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }

        $credentials = request(['gmail', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'fails',
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('travelapptrungnam');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'status' => 'success',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function uploadimage(Request $request)
    {
        $rp = Cloudinary()->upload("data:image/jpg;base64,$request->img")->getSecurePath();
        return tap(User::where('id', $request->id))->update(['avatar' => $rp])->first();
    }
    public function updateuser(Request $request)
    {
        return tap(User::where('id', $request->id))->update(['name' => $request->name])->first();
    }
    public function changepass(Request $request)
    {
        $user = User::find($request->id);
        if (Hash::check($request->mkcu, $user->password)) {
            return User::where('id', $request->id)->update(['password' => bcrypt($request->mkmoi)]);
        } else {
            return 0;
        }
    }
    public function changepassquenmk(Request $request)
    {
        return User::where('id', $request->id)->update(['password' => bcrypt($request->pass)]);
    }
    public function sendmailchangepass(Request $request)
    {
        // return "ok";
        $user = User::where("gmail", $request->gmail)->take(1)->get();
        if (User::where("gmail", $request->gmail)->exists()) {
            $passnew = rand(000000, 999999);
            Mail::send('mailfb', ['newpass' => $passnew], function ($message)  use ($user) {
                $message->to($user[0]->gmail, $user[0]->name)->subject('ĐỔI MẬT KHẨU');
            });
            if (count(Mail::failures()) > 0) {
                return response()->json([
                    'status' => 'fails',
                    'mess' => 'Có lỗi khi gửi OTP!'
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'otp' => $passnew,
                    'id' => $user[0]->id
                ]);
            }
        } else {
            return response()->json([
                'status' => 'fails',
                'mess' => 'Không tồn tại tài khoản gmail này!'

            ]);
        }
    }
    public function likeandislike(Request $request)
    {
        $iduser = $request->iduser;
        $idloca = $request->idloca;
        $user =  User::find($iduser);
        $listlike = explode(",", $user->listlike);
        if ($request->check == 1) { //like
            array_push($listlike, $idloca);
        } else { // 0 is dislike
            $idx = array_search($idloca, $listlike);
            if ($idx !== false) {
                unset($listlike[$idx]);
            }
        }
        $listlike = implode($listlike, ",");
        return tap(User::where('id', $iduser))->update(['listlike' => trim($listlike, ",")])->first();
    }
}
