<?php
namespace App\Dao;

use App\Contracts\Dao\NewsDaoInterface;
use App\Models\News;
use Mews\Purifier\Facades\Purifier;

class NewsDao implements NewsDaoInterface
{
    /**
     * Get Main index view function
     *
     * @return void
     */
    public function index()
    {
        return News::where([['public_flag', config('constants.FLAG_PUBLIC')], ['deleted_at', null]])->paginate(config('constants.PAGINATION'));
    }

    /**
     * Upload News function
     *
     * @param $param
     * @return void
     */
    public function newsUpload($param)
    {
        $news = new News();
        $news->title = $param->title;
        $news->message = Purifier::clean($param->message);
        $news->public_flag = $param->public_flag;
        $news->user_id = $param->user_id;
        $news->save();
    }

    /**
     * Get All News function
     *
     * @return void
     */
    public function showAllNews()
    {
        return News::where('deleted_at', null)->paginate(config('constants.PAGINATION'));
    }

    /**
     * Get News Edit function
     *
     * @param [int] $id
     * @return void
     */
    public function showNewsEdit($id)
    {
        return News::find($id);
    }

    /**
     * Delete News function
     *
     * @param [int] $id
     * @return void
     */
    public function deleteNews($id)
    {
        return News::where('id', $id)->update(['deleted_at' => now()]);
    }

    /**
     * Search News function
     *
     * @param [string] $searchnews
     * @return void
     */
    public function searchNews($searchnews)
    {
        return News::where('title', 'LIKE', '%' . $searchnews . '%')
            ->orwhere('message', 'LIKE', '%' . $searchnews . '%')
            ->where('deleted_at', null)
            ->paginate(config('constants.PAGINATION'));
    }

    /**
     * Update Flag function
     *
     * @param [stirng] $request
     * @param [int] $id
     * @return void
     */
    public function flagEdit($request, $id)
    {
        if ($request->public_flag == config('constants.FLAG_PUBLIC')) {
            $news = News::find($id);
            $news->public_flag = config('constants.FLAG_PUBLIC');
            $news->save();
        }

        if ($request->public_flag == config('constants.FLAG_PRIVATE')) {
            $news = News::find($id);
            $news->public_flag = config('constants.FLAG_PRIVATE');
            $news->save();
        }
    }

    /**
     * Get ProfileNews
     *
     * @param [int] $id
     * @return void
     */
    public function profileNews($id)
    {
        $profilenews = News::where('user_id', $id)
            ->where('deleted_at', null)
            ->paginate(config('constants.PAGINATION'));
        return $profilenews;
    }
}
