<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ResetServiceInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    private $resetService, $userService;

    /**
     * Create a new Controller instance.
     *
     * @param ResetServiceInterface $resetService
     */
    public function __construct(UserServiceInterface $userService, ResetServiceInterface $resetService)
    {
        $this->resetService = $resetService;
        $this->userService = $userService;
    }

    /**
     * Show Password Change Form function
     *
     * @return void
     */
    public function index()
    {
        return view('auth/password/changepassword');
    }

    /**
     * Store Password Change function
     *
     * @param Request $request
     * @return void
     */
    public function storePassword(Request $request)
    {
        $validator = $this->validatePassword($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->userService->storePassword($request);
        return redirect()->back()->with('message', config('constants.MSG_CHANGE_SUCCESS'));
    }

    /**
     * Get Password funtion
     *
     * @param $token
     * @return void
     */
    public function getPassword($token)
    {
        return view('auth.password.reset', ['token' => $token]);
    }

    /**
     * Update Password
     *
     * @param Request $request
     * @return void
     */
    public function updatePassword(Request $request)
    {
        $this->resetService->updatePassword($request);
        $this->userService->updatePassword($request);
        return redirect('/login')->with('message', config('constants.MSG_CHANGE_PASSWORD'));
    }

    /**
     * Get Email function
     *
     * @return void
     */
    public function getEmail()
    {
        return view('auth.password.email');
    }

    /**
     * Post Email Function
     *
     * @param Request $request
     * @return void
     */
    public function postEmail(Request $request)
    {
        $this->resetService->postEmail($request);
        return back()->with('status', config('constants.MSG_RESET_PASSWORD'));
    }

    /**
     * Validate ChangePassword function
     *
     * @param $request
     */
    private function validatePassword($request)
    {
        $rules = [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'required|same:new_password',
        ];
        return Validator::make($request->all(), $rules);
    }
}
