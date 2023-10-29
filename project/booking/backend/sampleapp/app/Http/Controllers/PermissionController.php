<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Displays a list of all permissions.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Number of records per page
        $perPage = $request->input('perPage', 5);

        // Get the pagination and sorting list of permissions
        $permissions = Permission::latest()->paginate($perPage);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Display the new permission creation form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Save the new permissions to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Permission::createPermission($data['name']);

        return redirect()->route('permissions.index');
    }

    /**
     * Displays the permissions editing form.
     *
     * @param  int  $permissionsId
     * @return \Illuminate\View\View
     */
    public function edit($permissionsId)
    {
        $permission = Permission::getPermissionById($permissionsId);
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update permission information in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $permission->update($data);

        return redirect()->route('permissions.index');
    }

    /**
     * Remove a permission from the database.
     *
     * @param  int  $permissionsId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($permissionsId)
    {
        $permissions = Permission::find($permissionsId);

        if (!$permissions) {
            // Handle the case where the booking status is not found
            abort(404);
        }

        $permissions->delete();

        return redirect()->route('permissions.index');
    }
}
