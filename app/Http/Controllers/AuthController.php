<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $request) {
        $data = $request->only('email','password','remember_token');
        if (Auth::attempt($data)) {
            if(Auth::check() && Auth::user()->level === 0) {
                return redirect()->intended('admin/trang-chu')->with('Đăng nhập thành công');
            }
            return redirect()->route('index');
        }
        return redirect()->route('login');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postregister(Request $request){
        $request->validate([
            'email'=> 'required|min:3|max:100' ,
            'name'=> 'required|min:3|max:100',
            'password'=> 'required|min:8|confirmed|max:100|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ],[
            'email.required' => 'Email không được bỏ trống',
            'email.min' => 'Email tối thiểu có 3 kí tự',
            'email.max' => 'Email tối đa 100 kí tự',
            'name.required' => 'Họ và Tên không được để trống',
            'name.min' => 'Tên tối thiểu có 3 kí tự',
            'name.max' => 'Tên tối đa có 100 kí tự',
            'name.min' => 'Tên tối thiểu có 3 kí tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu có tối thiểu 8 kí tự',
            'password.max' => 'Mật khẩu tối đa có 100 kí tự',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp',
            'password.regex' => 'Mật khẩu cần có chữ hoa,thường,số và kí tự đặc biệt'
        ]);
        $data = $request->only('email','name','password','full_name','address','phone');
        $register = new User();
        $register->name = $data['name'];
        $register->full_name = $data['full_name'];
        $register->address = $data['address'];
        $register->phone = $data['phone'];
        $register->email = $data['email'];
        $register->password = bcrypt($data['password']);
        $register->level = 1;
        $register->save();
        return redirect()->route('login');
    }
}
