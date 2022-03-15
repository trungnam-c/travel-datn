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
            'email' => 'required',
            'images' => 'required',
            'isAdmin'   => 'required'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->password = md5($request->password);
        $data->email = $request->email;
        $data->avatar = $request->images;
        $data->isAdmin = $request->isAdmin;

        $data->save();

        return redirect()->back();
    }

    public function index()
    {
        $data = User::paginate(10);
        return view('Admin/user/listUser',['data'=>$data]);
    }

    public function show(User $user)
    {
        return view('admin.user.editUser', [
            'title' => 'Chỉnh sửa khách hàng',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'images' => 'required',
            'isAdmin'   => 'required'
        ]);

        $result = $this->user->update($request, $user);
        if ($result) {
            return redirect('/quantri/user/list');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        User::select('*')->where('id','=',$id)->delete();

        return back()->with("success", "Xoá thành công!");
    }


}
