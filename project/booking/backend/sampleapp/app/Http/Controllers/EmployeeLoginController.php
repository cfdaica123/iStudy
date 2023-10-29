<?php

// app/Http/Controllers/EmployeeLoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EmployeeLoginController extends Controller
{
    /**
     * Hiển thị form đăng nhập cho nhân viên.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.employee-login');
    }

    /**
     * Xử lý đăng nhập của nhân viên.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công

            // Kiểm tra xem người dùng có phải là nhân viên hay không (có thể thay đổi dựa trên cấu trúc bảng của bạn)
            if (Auth::user()->is_employee) {
                return redirect('/welcome'); // Chuyển hướng đến trang dashboard nhân viên
            }

            // Nếu không phải nhân viên, đăng xuất và chuyển hướng
            Auth::logout();
        }

        return redirect()->route('employee.login.form')->with('error', 'Invalid credentials');
    }

    /**
     * Đăng xuất nhân viên.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        // Chuyển hướng về trang đăng nhập
        return redirect()->route('employee.login.form');
    }
}
