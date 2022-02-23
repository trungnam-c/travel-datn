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
            Session::flash('success', 'Thêm user mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm user bị lỗi. Vui lòng thử lại');
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
            Session::flash('success', 'Cập nhật user thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật user bị lỗi. Vui lòng thử lại');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $path = str_replace('storage', 'public', $user->avatar);
            Storage::delete($path);
            $user->delete();
            return true;
        }

        return false;
    }

    
}
