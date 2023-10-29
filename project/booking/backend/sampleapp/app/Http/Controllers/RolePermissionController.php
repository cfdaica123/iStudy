<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolePermission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of role permissions.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $rolePermissions = RolePermission::with(['role', 'permission'])->latest()->paginate($perPage);

        return view('role_permissions.index', compact('rolePermissions'));
    }

    /**
     * Show the form for creating a new role permission.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Lấy danh sách roles và permissions nếu cần
        $roles = \App\Models\Role::all();
        $permissions = \App\Models\Permission::all();

        return view('role_permissions.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created role permission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rolePermission = new RolePermission();

        $data = $request->validate([
            'role_id' => 'required|exists:roles,role_id',
            'permission_id' => 'required|exists:permissions,permission_id',
        ]);

        $rolePermission->createRolePermission($data);

        return redirect()->route('role_permissions.index');
    }

    /**
     * Show the form for editing a role permission.
     *
     * @param  int  $rolePermissionId
     * @return \Illuminate\View\View
     */
    public function edit($rolePermissionId)
    {
        $rolePermission = RolePermission::with(['role', 'permission'])->findOrFail($rolePermissionId);

        // Lấy danh sách roles và permissions nếu cần
        $roles = \App\Models\Role::all();
        $permissions = \App\Models\Permission::all();

        return view('role_permissions.edit', compact('rolePermission', 'roles', 'permissions'));
    }

    /**
     * Update the role permission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $rolePermissionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $rolePermissionId)
    {
        $rolePermission = new RolePermission();

        $data = $request->validate([
            'role_id' => 'required|exists:roles,role_id',
            'permission_id' => 'required|exists:permissions,permission_id',
        ]);

        $rolePermission->updateRolePermission($rolePermissionId, $data);

        return redirect()->route('role_permissions.index');
    }

    /**
     * Remove the role permission.
     *
     * @param  int  $rolePermissionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($rolePermissionId)
    {
        $rolePermission = new RolePermission();

        if (!$rolePermission->deleteRolePermission($rolePermissionId)) {
            abort(404);
        }

        return redirect()->route('role_permissions.index');
    }

    /**
     * Display the specified role permission.
     *
     * @param  int  $rolePermissionId
     * @return \Illuminate\View\View
     */
    // Trong RolePermissionController, hàm show
    public function show($rolePermissionId)
    {
        $rolePermission = RolePermission::with(['role.permissions'])->findOrFail($rolePermissionId);

        return view('role_permissions.show', compact('rolePermission'));
    }
}
