<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
    /**
     * Show ALl User in the Database function
     *
     * @return void
     */
    public function showAllUsers()
    {
        return User::where('deleted_at', null)->paginate(config('constants.PAGINATION'));
    }

    /**
     * User Register function
     *
     * @param $param
     * @return void
     */
    public function registerUser($param)
    {
        return User::insert($param);
    }

    /**
     * Show User Detail function
     *
     * @param [int] $id
     * @return void
     */
    public function showusernews($id)
    {
        $userprofile = User::find($id);
        return $userprofile;
    }

    /**
     * Delete User function
     *
     * @param [type] $id
     * @return void
     */
    public function deleteUser($id)
    {
        return User::where('id', $id)->update(['deleted_at' => now()]);
    }

    /**
     * Show User Edit function
     *
     * @param [int] $id
     * @return void
     */
    public function showUserEdit($id)
    {
        return User::find($id);
    }

    /**
     * Update User function
     *
     * @param $request
     * @param [int] $id
     * @return void
     */
    public function updateUser($request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->gender = $request->gender;
        $user->update(['updated_at' => now()]);
    }

    /**
     * Search User function
     *
     * @param [string] $searchuser
     * @return void
     */
    public function searchUser($searchuser)
    {
        return User::where('name', 'LIKE', '%' . $searchuser . '%')
            ->orwhere('email', 'LIKE', '%' . $searchuser . '%')
            ->where('deleted_at', null)
            ->paginate(config('constants.PAGINATION'));
    }

    /**
     * Store Password function
     *
     * @param $request
     * @return void
     */
    public function storePassword($request)
    {
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
    }

    /**
     * Update Password function
     *
     * @param $request
     * @return void
     */
    public function updatePassword($request)
    {
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
    }
}
