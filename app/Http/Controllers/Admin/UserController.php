<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
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
        return view('admin.user.add', [
            'title' => 'Thêm user mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'gmail' => 'required',
            'avatar' => 'required',
            'isAdmin'   => 'required'
        ]);

        $this->user->insert($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.user.list', [
            'title' => 'Danh Sách user Mới Nhất',
            'users' => $this->user->get()
        ]);
    }

    public function show(User $user)
    {
        return view('admin.user.edit', [
            'title' => 'Chỉnh Sửa user',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'gmail' => 'required',
            'avatar' => 'required',
            'isAdmin'   => 'required'
        ]);

        $result = $this->user->update($request, $user);
        if ($result) {
            return redirect('/admin/user/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->user->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công user'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
