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

        $this->user->insert($request);

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
            'gmail' => 'required',
            'images' => 'required',
            'isAdmin'   => 'required'
        ]);

        $result = $this->user->update($request, $user);
        if ($result) {
            return redirect('/quantri/user/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->user->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công khách hàng'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }


}
