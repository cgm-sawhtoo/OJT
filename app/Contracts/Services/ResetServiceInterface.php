<?php
namespace App\Contracts\Services;

interface ResetServiceInterface
{
    public function postEmail($request);

    public function updatePassword($request);
}
