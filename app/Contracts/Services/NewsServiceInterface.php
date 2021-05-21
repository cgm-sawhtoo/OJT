<?php
namespace App\Contracts\Services;

interface NewsServiceInterface
{
    public function index();

    public function newsUpload($param);

    public function showAllNews();

    public function showNewsEdit($id);

    public function deleteNews($id);

    public function searchNews($request);

    public function flagEdit($request, $id);

    public function profileNews($id);
}
