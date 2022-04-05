<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\User\UserService;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        return view('admin.user.addUser', [
            'title' => 'Thêm khách hàng mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'gmail' => 'required',
            'images' => 'required',
            'isAdmin'   => 'required'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->password = bcrypt($request->password);
        $data->gmail = $request->gmail;
        $data->avatar = $this->xoadauphay($request->images);
        $data->isAdmin = $request->isAdmin;
        $data->save();

        return redirect('admin/user/danh-sach-khach-hang')->with('success','Thêm tài khoản mới thành công!');
    }

    public function index()
    {
        $data = User::paginate(10);
        return view('Admin/user/listUser', ['data' => $data]);
    }

    public function show(User $user)
    {
        return view('admin.user.editUser', [
            'title' => 'Chỉnh sửa khách hàng',
            'user' => $user
        ]);
    }

    public function update(Request $request, $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'gmail' => 'required|email',
            'images' => 'required',
            'isAdmin'   => 'required'
        ]);
        $input = $request->all();
        $userUpdate = User::find($user);
        $userUpdate->name = $input['name'];
        $userUpdate->password = $input['password'];
        $userUpdate->gmail = $input['gmail'];
        $userUpdate->avatar = $this->xoadauphay($input['images']);
        $userUpdate->isAdmin = $input['isAdmin'];
        $userUpdate->save();

        return redirect('admin/user/danh-sach-khach-hang')->with('success','Sửa thành công!');
    }

    public function destroy($id)
    {
        User::select('*')->where('id', '=', $id)->delete();

        return back()->with("success", "Xoá thành công!");
    }

    public function xoadauphay($text)
    {
        $data = "";
        if ($text != "") {
            $arr1 = [];
            $arr = explode(',', $text);
            foreach ($arr as $a) {
                if ($a != null) {
                    array_push($arr1, $a);
                }

            }
            $data = implode(",", $arr1);
        }

        return $data;
    }
}
