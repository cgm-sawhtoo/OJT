<?php
namespace App\Services;

use App\Contracts\Dao\ResetDaoInterface;
use App\Contracts\Services\ResetServiceInterface;

class ResetService implements ResetServiceInterface
{
    private $resetDao;

    /**
     * Constructor
     *
     * @param ResetDaoInterface $resetDao
     */
    public function __construct(ResetDaoInterface $resetDao)
    {
        $this->resetDao = $resetDao;
    }

    /**
     * Post Email function
     *
     * @param $request
     * @return void
     */
    public function postEmail($request)
    {
        $request->validate([
            'email' => 'required|email|exists:users|max:50',
        ]);
        $this->resetDao->postEmail($request);
    }

    /**
     * Update Password function
     *
     * @param $request
     * @return void
     */
    public function updatePassword($request)
    {
        $request->validate([
            'email' => 'required|email|exists:users|max:50',
            'password' => 'required|min:8',
            'password-confirm' => 'required|same:password',

        ]);

        $this->resetDao->updatePassword($request);
    }
}
