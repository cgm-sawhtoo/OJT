<?php
namespace App\Contracts\Dao;

interface UserDaoInterface
{
    public function showAllUsers();

    public function registerUser($param);

    public function showusernews($id);

    public function deleteUser($id);

    public function showUserEdit($id);

    public function updateUser($request, $id);

    public function searchUser($request);

    public function storePassword($request);

    public function updatePassword($request);
}
