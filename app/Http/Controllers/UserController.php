<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceInterface;
use App\Contracts\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $usersService, $newsService;

    /**
     * Create a new controller instance.
     *
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $usersService, NewsServiceInterface $newsService)
    {
        $this->usersService = $usersService;
        $this->newsService = $newsService;
    }

    /**
     * Add user view
     *
     * @return void
     */
    public function addUser()
    {
        return view('users.useradd');
    }

    /**
     * Show All Users function
     *
     * @return void
     */
    public function showAllUsers()
    {
        $allusers = $this->usersService->showAllUsers();
        return view('users.userlist', compact('allusers'));
    }

    /**
     * Show User Details function
     *
     * @param $id
     * @return void
     */
    public function showusernews($id)
    {
        $profilenews = $this->newsService->profileNews($id);
        $userdetails = $this->usersService->showusernews($id);
        return view('users.userdetail', compact('userdetails', 'profilenews'));
    }

    /**
     * Delete User function
     *
     * @param $id
     * @return void
     */
    public function deleteUser($id)
    {
        $this->usersService->deleteUser($id);
        return redirect()->back();
    }

    /**
     * Show User Edit Form function
     *
     * @param $id
     * @return void
     */
    public function showUserEdit($id)
    {
        $useredit = $this->usersService->showUserEdit($id);
        return view('users.useredit', compact('useredit'));
    }

    /**
     * Update User function
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function updateUser(Request $request, $id)
    {
        $validator = $this->validateUpdateUsers($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->usersService->updateUser($request, $id);
        return redirect()->back()->with('message', config('constants.MSG_UPDATE_OK'));
    }

    /**
     * Search User function
     *
     * @param Request $request
     * @return void
     */
    public function searchUser(Request $request)
    {
        $searchuser = $request->input('search-input');
        $allusers = $this->usersService->searchUser($searchuser);

        return view('users.userlist', compact('allusers'));
    }

    /**
     * Validate UpdateUser function
     *
     * @param Request $request
     */
    private function validateUpdateUsers($request)
    {
        $rules = [
            'name' => 'required|max:25',
            'email' => 'required|email|max:50|unique:users,email,' . $request->id,
        ];
        return Validator::make($request->all(), $rules);
    }
}
