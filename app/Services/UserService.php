<?php

namespace App\Services;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Constructor
     *
     * @param UserDaoInterface $userDao
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    public function storePassword($request)
    {
        $this->userDao->storePassword($request);
    }

    /**
     * Get All User function
     *
     * @return void
     */
    public function showAllUsers()
    {
        return $this->userDao->showAllUsers();
    }

    /**
     * Login function
     *
     * @param $credentials
     * @return void
     */
    public function login($credentials)
    {
        return Auth::attempt($credentials);
    }

    /**
     * Register function
     *
     * @param $request
     * @return void
     */
    public function registerUser($request)
    {
        $param = $this->createRegisterUser($request);
        $this->userDao->registerUser($param);
    }

    /**
     * Register User function
     *
     * @param $request
     * @return void
     */
    public function createRegisterUser($request)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            $param = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'gender' => $request->input('gender'),
                'remember_token' => Str::random(15),
                'is_admin' => $request->input('is_admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        } else {
            $param = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'gender' => $request->input('gender'),
                'remember_token' => Str::random(15),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $param;
    }

    /**
     * Get User Detail function
     *
     * @param [int] $id
     * @return void
     */
    public function showusernews($id)
    {
        return $this->userDao->showusernews($id);
    }

    /**
     * Delete User function
     *
     * @param [type] $id
     * @return void
     */
    public function deleteUser($id)
    {
        $this->userDao->deleteUser($id);
    }

    /**
     * Edit User function
     *
     * @param [int] $id
     * @return void
     */
    public function showUserEdit($id)
    {
        return $this->userDao->showUserEdit($id);
    }

    /**
     * Logout function
     *
     * @return void
     */
    public function logout()
    {
        $logout = Auth::logout();
        return $logout;
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
        return $this->userDao->updateUser($request, $id);
    }

    /**
     * Search User function
     *
     * @param [string] $searchuser
     * @return void
     */
    public function searchUser($searchuser)
    {
        return $this->userDao->searchUser($searchuser);
    }

    /**
     * Update Password function
     *
     * @param $request
     * @return void
     */
    public function updatePassword($request)
    {
        return $this->userDao->updatePassword($request);
    }
}
