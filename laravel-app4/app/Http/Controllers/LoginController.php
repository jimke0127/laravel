<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 这个是用户认证的门面
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // 如果用户已经登录，则跳转到首页
        if (Auth::user()) {
            return redirect('/');
        }
        return view('login');
    }

    public function store(Request $request)
    {
        // 添加验证逻辑
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:16|alpha_num',
        ], [
            'email.required' => '请输入邮箱',
            'email.email' => '请输入正确的邮箱格式',
            'password.required' => '请输入密码',
            'password.min' => '密码长度不能小于6位',
            'password.max' => '密码长度不能大于16位',
            'password.alpha_num' => '密码只能由字母和数字组成'
        ]);

        // 这里进行登录逻辑
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {
            // 登录成功就跳转到首页
            return redirect('/');
        }

        // 如果登录失败，则返回错误信息
        // withInput 保留邮箱的输入信息
        return redirect('/login')->withErrors([
            'password' => '登录失败'
        ])->withInput($request->except('password'));
    }
    /**
     * 将用户从应用程序中登出。
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
