<?php


namespace App\Http\Services\User;


use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function insert($request)
    {
        try {
            #$request->except('_token');
            User::create($request->input());
            Session::flash('success', 'Thêm khách hàng mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm khách hàng bị lỗi. Vui lòng thử lại');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }

    public function update($request, $user)
    {
        try {
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật khách hàng thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật khách hàng bị lỗi. Vui lòng thử lại');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $user = User::where('id', $id)->first();
        if ($user) {
            return User::where('id', $id)->delete();
        }
        return false;
    }

    

    
}
