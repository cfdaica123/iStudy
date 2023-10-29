<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserStatus;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $users = User::with('role')->latest()->paginate($perPage);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $statuses = UserStatus::orderBy('name')->get();
        $roles = Role::all();
        $user = new User();

        return view('users.create', compact('statuses', 'roles', 'user'));
    }

    /**
     * Store a newly created user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // UserController.php
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,NULL,user_id',
            'password' => 'required|string|max:255',
            'user_status_id' => 'exists:user_statuses,user_status_id',
            'role_id' => 'exists:roles,role_id',
        ]);

        $data['user_status_id'] = 4;
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        // Liên kết vai trò với người dùng
        $user->role()->associate($request->role_id);
        $user->save();

        return redirect()->route('users.index');
    }









    /**
     * Show the form for editing a user.
     *
     * @param  int  $userId
     * @return \Illuminate\View\View
     */
    public function edit($userId)
    {
        $user = new User();
        $user = $user->getUserById($userId);
        $roles = Role::all();
        $statuses = UserStatus::all(); // Thêm dòng này để lấy danh sách các user statuses

        return view('users.edit', compact('user', 'roles', 'statuses'));
    }


    /**
     * Update the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    // UserController.php
    public function update(Request $request, $userId)
    {
        $user = new User();
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId . ',user_id',
            'password' => 'nullable|string|min:6',
            'user_status_id' => 'required|exists:user_statuses,user_status_id',
            'role_id' => 'exists:roles,role_id',
        ]);


        $user->updateUser($userId, $data);

        return redirect()->route('users.index');
    }




    /**
     * Remove the user.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            abort(404);
        }

        $user->delete();

        return redirect()->route('users.index');
    }

    // UserController.php
    public function show($userId)
    {
        $user = User::with(['customer', 'employee'])->findOrFail($userId);

        return view('users.show', compact('user'));
    }
}
