<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User; // Don't forget to import User model
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $customers = Customer::latest()->paginate($perPage);

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthday' => 'nullable|date',
        ]);

        // Tạo một người dùng mới
        $user = User::create([
            'email' => 'your_email@example.com', // Cập nhật email thực tế
            'password' => bcrypt('your_password'), // Cập nhật mật khẩu thực tế
        ]);

        // Tạo khách hàng và liên kết với người dùng mới
        $customer = $user->customer()->create([
            'full_name' => $request->input('full_name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'image' => 'path/to/your/image.jpg', // Cập nhật đường dẫn hình ảnh thực tế
            'birthday' => $request->input('birthday'),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            // Add other validation rules as needed
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
