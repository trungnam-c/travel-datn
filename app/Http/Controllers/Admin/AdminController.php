<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        $diadiem = DB::table('location')->get();
        $chitietdiadiem = DB::table('detail_location')->get();
        $dataVe = DB::table('datve')->get();
        // data ve theo dia diem
        $data = [];
        for ($i = 0; $i < count($diadiem); $i++) {
            $data[] = DB::table('datve')
                ->join('detail_location', 'datve.idlocation_detail', '=', 'detail_location.id')
                ->join('location', 'location.id', '=', 'detail_location.idlocation')
                ->select('*')
                ->where('detail_location.idlocation', '=', $diadiem[$i]->id)
                ->count();
        }

        // data chuyen di theo dia diem
        $dataDetailLocation = [];
        for ($i = 0; $i < count($diadiem); $i++) {
            $dataDetailLocation[] = DB::table('detail_location')
            ->join('location','location.id','=','detail_location.idlocation')
            ->select('*')
            ->where('detail_location.idlocation','=', $diadiem[$i]->id)
            ->count();
        }
        return view('admin.home', compact('diadiem', 'chitietdiadiem', 'dataVe', 'data','dataDetailLocation'));
    }

    public function login()
    {
        return view('/admin/login');
    }

    public function profile()
    {
        return view('/admin/edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:4', 'max: 30', 'regex:/^\S*$/u'],
            'gmail' => ['nullable', 'email'],
        ], [
            'name.required' => 'Tên đăng nhập không được để trống',
            'name.min' => 'Tối thiểu 4 ký tự',
            'name.max' => 'Tối đa 30 ký tự',
            'name.regex' => 'Tên đăng nhập không được có khoảng trắng',
            'gmail.required' => 'Email không được để trống',
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        $user->gmail = $request['gmail'];
        $user->password = Auth::user()->password;
        $user->isAdmin = 1;

        if ($request->hasFile('avatar')) {
            $destination = 'dist/img/' . $user->avatar;
            if (File::exists($destination)) {
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
