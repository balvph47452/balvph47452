<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listCate(){
        $users = User::all();

        return view('admin.users.list', compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', "unique:users,name"],
            'email' => ['required', "unique:users,email"],
            'password' => ['required', 'min:6'],
            'password_confirm' => ['required', 'same:password'],
        ], [
            'name.required' => 'Không được bỏ trống',
            'name.unique' => 'Tên đã tồn tại',
            'email.required' => 'Không được bỏ trống',
            'email.unique' => 'Email đã tồn tại',
        ]);

        User::query()->create($data);
        return redirect()->route('users.list')->with('message', 'Thêm mới thành công');

    }

    public function destroy($id)
{
    // Kiểm tra xem người dùng có đang cố gắng xóa chính tài khoản của mình không
    if (Auth::id() == $id) {
        return redirect()->route('users.list')->with('message', 'Bạn không thể xóa tài khoản của chính mình');
    }

    // Xóa người dùng nếu không phải là tài khoản đang đăng nhập
    User::query()->findOrFail($id)->delete();

    return redirect()->route('users.list')->with('message', 'Xóa người dùng thành công');
}

    public function edit($id) {
        $user = User::query()->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'name' => ['required', "unique:users,name, $id"],
            'email' => ['required', "unique:users,email, $id"],
        ], [
            'name.required' => 'Không được bỏ trống',
            'name.unique' => 'Tên đã tồn tại',
            'email.required' => 'Không được bỏ trống',
            'email.unique' => 'Email đã tồn tại',
        ]);
        $user->update($data);
        return redirect()->back()->with('message', 'Sửa tài khoản thành công');
    }

    public function formChange()
    {
        return view('admin.users.changepass');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:6','different:current_password'],
            'password_confirm' => ['required', 'same:password'],
        ]);

        if (!Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('formChange')->with('success', 'Đổi mật khẩu thành công!');
    }

    public function login()
    {
        return view('admin.users.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('admin.home')->with('message', 'Đăng nhập thành công');
        }

        return back()->withErrors(['email' => "Thông tin đăng nhập không chính xác"])->withInput();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
