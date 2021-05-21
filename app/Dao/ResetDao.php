<?php
namespace App\Dao;

use App\Contracts\Dao\ResetDaoInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetDao implements ResetDaoInterface
{
    /**
     * Post Email function
     *
     * @param $request
     * @return void
     */
    public function postEmail($request)
    {
        $token = Str::random(config('constants.TOKEN_EXPIRE_TIME'));
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.email.verify', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject(config('constants.MSG_RESET'));
        });
    }

    /**
     * Update Password function
     *
     * @param $request
     * @return void
     */
    public function updatePassword($request)
    {
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
    }
}
