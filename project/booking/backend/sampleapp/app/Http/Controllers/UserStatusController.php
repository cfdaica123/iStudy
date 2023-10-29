<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStatus;

class UserStatusController extends Controller
{
    /**
     * Display a listing of user statuses.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $userStatuses = UserStatus::latest()->paginate($perPage);

        return view('user_statuses.index', compact('userStatuses'));
    }

    /**
     * Show the form for creating a new user status.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user_statuses.create');
    }

    /**
     * Store a newly created user status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, UserStatus $userStatus)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userStatus->createUserStatus($data);

        return redirect()->route('user_statuses.index');
    }


    /**
     * Show the form for editing a user status.
     *
     * @param  int  $statusId
     * @return \Illuminate\View\View
     */
    public function edit($statusId)
    {
        $userStatus = (new UserStatus())->getUserStatusById($statusId);
        return view('user_statuses.edit', compact('userStatus'));
    }

    /**
     * Update the user status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $statusId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $statusId)
    {
        $userStatus = new UserStatus();

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userStatus->updateUserStatus($statusId, $data);

        return redirect()->route('user_statuses.index');
    }


    /**
     * Remove the user status.
     *
     * @param  int  $statusId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($statusId)
    {
        $userStatus = UserStatus::find($statusId);

        if (!$userStatus) {
            // Handle the case where the user status is not found
            abort(404);
        }

        $userStatus->delete();

        return redirect()->route('user_statuses.index');
    }
}
