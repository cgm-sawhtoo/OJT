<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    private $newsService;

    /**
     * Create a news controller instance.
     *
     * @param NewsServiceInterface $newsService
     */
    public function __construct(NewsServiceInterface $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * Add Upload News
     *
     * @return void
     */
    public function addUpload()
    {
        return view('news.newsupload');
    }

    /**
     * Insert News function
     *
     * @param Request $request
     * @return void
     */
    public function newsUpload(Request $request)
    {
        $validator = $this->validateInput($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->newsService->newsUpload($request);
        return redirect()->back()->with('message', config('constants.MSG_UPLOADED'));
    }

    /**
     * Show First Dashborad function
     *
     * @return void
     */
    public function index()
    {
        $index = $this->newsService->index();
        return view('news.index', compact('index'));
    }

    /**
     * Show User's News function
     *
     * @return void
     */
    public function showNewsUser()
    {
        $usernews = $this->newsService->index();
        return view('users.usernewslist', compact('usernews'));
    }

    /**
     * Show All News function
     *
     * @return void
     */
    public function showAllNews()
    {
        $allnews = $this->newsService->showAllNews();
        return view('news.newslist', compact('allnews'));
    }

    /**
     * Show News Edit Form function
     *
     * @param $id
     * @return void
     */
    public function newsEdit($id)
    {
        $newsedits = $this->newsService->showNewsEdit($id);
        return view('news.newsedit', compact('newsedits'));
    }

    /**
     * Update News's Flag function
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function flagEdit(Request $request, $id)
    {
        $flagEdit = $this->newsService->flagEdit($request, $id);
        return redirect()->back();
    }

    /**
     * Delete News function
     *
     * @param $id
     * @return void
     */
    public function deleteNews($id)
    {
        $this->newsService->deleteNews($id);
        return redirect()->back();
    }

    /**
     * Search News function
     *
     * @param Request $request
     * @return void
     */
    public function searchNews(Request $request)
    {
        $searchnews = $request->input('search-input');
        if (auth()->user()->is_admin == 'true') {
            $allnews = $this->newsService->searchNews($searchnews);
            return view('news.newslist', compact('allnews'));
        } else {
            $usernews = $this->newsService->searchNews($searchnews);
            return view('users.usernewslist', compact('usernews'));
        }
    }

    /**
     * Validate Input Data function
     *
     * @param $request
     */
    private function validateInput($request)
    {
        $rules = [
            'title' => 'required|max:100|string',
            'message' => 'required',
        ];
        return Validator::make($request->all(), $rules);
    }
}
