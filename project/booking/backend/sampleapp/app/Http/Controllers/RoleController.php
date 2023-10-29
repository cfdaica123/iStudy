<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $roles = Role::latest()->paginate($perPage);

        return view('roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $role = new Role(); // Tạo một instance mới của model Role

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role->createRole($data);

        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing a role.
     *
     * @param  int  $roleId
     * @return \Illuminate\View\View
     */
    public function edit($roleId)
    {
        $role = new Role();
        $role = $role->getRoleById($roleId);

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $roleId)
    {
        $role = new Role(); // Tạo một instance mới của model Role

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role->updateRole($roleId, $data);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the role.
     *
     * @param  int  $roleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($roleId)
    {
        $role = Role::find($roleId);

        if (!$role) {
            abort(404);
        }

        $role->delete();

        return redirect()->route('roles.index');
    }

    public function showPermissions($role_id)
    {
        $role = Role::findOrFail($role_id);
        return view('roles.show_permissions', compact('role'));
    }

    public function editPermissions($role_id)
    {
        $role = Role::findOrFail($role_id);
        $permissions = Permission::all();

        return view('roles.edit_permissions', compact('role', 'permissions'));
    }

    public function updatePermissions(Request $request, $role_id)
    {
        // Lấy danh sách quyền từ request
        $selectedPermissions = $request->input('permissions', []);

        // Xóa toàn bộ quyền của vai trò
        RolePermission::where('role_id', $role_id)->delete();

        // Thêm quyền mới cho vai trò
        foreach ($selectedPermissions as $permission_id) {
            RolePermission::create([
                'role_id' => $role_id,
                'permission_id' => $permission_id,
            ]);
        }

        return redirect()->route('roles.show-permissions', $role_id)->with('success', 'Permissions updated successfully');
    }
}
