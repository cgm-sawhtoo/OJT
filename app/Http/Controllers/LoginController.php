<?php

namespace App\Http\Controllers;

use App\Contracts\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
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
     * Login Page function
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login.loginusers');
    }

    /**
     * Login User function
     *
     * @param Request $request
     * @return void
     */
    public function loginUser(Request $request)
    {
        $validator = $this->validateLoginUser($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if ($this->usersService->login($credentials)) {

            if (auth()->user()->is_admin == 'true') {
                return redirect()->route('all#users');
            } else {
                return redirect()->route('newslist#user');
            }
        } else {
            return back()->with('error', config('constants.MSG_CHECK_INPUT'));
        }
    }

    /**
     * Logout function
     *
     * @return void
     */
    public function logout(Request $request)
    {
        $this->usersService->logout();
        $request->session()->flush();
        return redirect()->route('index');
    }

    /**
     * Validate LoginUser function
     *
     * @param $request
     */
    private function validateLoginUser($request)
    {
        $rules = [
            'email' => 'required|email|max:50',
            'password' => 'required|min:8',
        ];
        return Validator::make($request->all(), $rules);
    }
}
