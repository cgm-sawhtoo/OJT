<?php
namespace App\Contracts\Dao;

interface ResetDaoInterface
{
    public function postEmail($request);

    public function updatePassword($request);
}
