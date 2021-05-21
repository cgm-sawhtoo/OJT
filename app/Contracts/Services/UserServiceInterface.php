<?php

namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function storePassword($request);

    public function showAllUsers();

    public function login($credentials);

    public function logout();

    public function registerUser($param);

    public function showusernews($id);

    public function deleteUser($id);

    public function showUserEdit($id);

    public function updateUser($request, $id);

    public function searchUser($request);

    public function updatePassword($request);

}
