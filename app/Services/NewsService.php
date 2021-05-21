<?php

namespace App\Services;

use App\Contracts\Dao\NewsDaoInterface;
use App\Contracts\Services\NewsServiceInterface;

class NewsService implements NewsServiceInterface
{

    private $newsDao;

    /**
     * Constructor
     *
     * @param NewsDaoInterface $newsDao
     */
    public function __construct(NewsDaoInterface $newsDao)
    {
        $this->newsDao = $newsDao;
    }

    /**
     * Get Main index view function
     *
     * @return void
     */
    public function index()
    {
        return $this->newsDao->index();
    }

    /**
     * Upload News funciton
     *
     * @param $request
     * @return void
     */
    public function newsUpload($request)
    {
        $this->newsDao->newsUpload($request);
    }

    /**
     * Show All News function
     *
     * @return void
     */
    public function showAllNews()
    {
        return $this->newsDao->showAllNews();
    }

    /**
     * Get Edit News function
     *
     * @param [int] $id
     * @return void
     */
    public function showNewsEdit($id)
    {
        return $this->newsDao->showNewsEdit($id);
    }

    /**
     * Delete News function
     *
     * @param [int] $id
     * @return void
     */
    public function deleteNews($id)
    {
        return $this->newsDao->deleteNews($id);
    }

    /**
     * Search News function
     *
     * @param [string] $searchnews
     * @return void
     */
    public function searchNews($searchnews)
    {
        return $this->newsDao->searchNews($searchnews);
    }

    /**
     * Update Flag function
     *
     * @param [string] $request
     * @param [int] $id
     * @return void
     */
    public function flagEdit($request, $id)
    {
        return $this->newsDao->flagEdit($request, $id);
    }

    /**
     * Get profileNews
     *
     * @param [int] $id
     * @return void
     */
    public function profileNews($id)
    {
        return $this->newsDao->profileNews($id);
    }
}
