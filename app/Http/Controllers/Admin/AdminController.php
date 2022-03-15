<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home', [
            'title' => 'Trang quản trị'
        ]);
    }

    public function login() {
        return view('/admin/login');
    }

    public function profile() {
        return view('/admin/edit');
    }

    public function update(Request $request){
        $request->validate([
            'name' => ['required', 'min:4', 'max: 30', 'regex:/^\S*$/u'],
            'email' => ['nullable', 'email']
        ],[
            'name.required' => 'Tên đăng nhập không được để trống',
            'name.min' => 'Tối thiểu 4 ký tự',
            'name.max' => 'Tối đa 30 ký tự',
            'name.regex' => 'Tên đăng nhập không được có khoảng trắng',
            'email.required' => 'Gmail không được để trống',
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        $user->gmail = $request['gmail'];
        $user->password = Auth::user()->password;
        $user->isAdmin = 1;

        if($request->hasFile('avatar')){
            $destination = 'dist/img/' . $user->avatar;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('dist/img/', $filename);
            $user->avatar = $filename;
        }
        $user->save();

        return redirect('/admin/profile')->with('success', 'Cập nhật hồ sơ thành công!');
    }
}
