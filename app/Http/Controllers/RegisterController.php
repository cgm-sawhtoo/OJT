<?php

namespace App\Http\Controllers;

use App\Contracts\Services\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    private $usersService;

    /**
     * Create a new controller instance.
     *
     * @param UserServiceInterface $adminService
     */
    public function __construct(UserServiceInterface $usersService)
    {
        $this->usersService = $usersService;
    }

    /**
     * Register User function
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login.registerusers');
    }

    /**
     * Register User function
     *
     * @param Request $request
     * @return void
     */
    public function registerUser(Request $request)
    {
        $validator = $this->validateRegisterUser($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->usersService->registerUser($request);
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->back()->with('message', config('constants.MSG_CARE'));
        } else {
            return view('auth.login.loginusers')->with('message', config('constants.MSG_SUCCESS'));
        }
    }

    /**
     * Validate RegisterUser function
     *
     * @param Request $request
     */
    private function validateRegisterUser($request)
    {
        $rules = [
            'name' => 'required|max:25',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|min:8',
        ];
        return Validator::make($request->all(), $rules);
    }
}
