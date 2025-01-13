<?php

namespace App\Http\Controllers\Api\Auth;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
class VerifyEmailController extends Controller
{
    public function sendMail(Request $request)
    {
        Mail::to($request->user())->send(new VerifyEmail($request->user()));
        return response()->json([
           'message' => 'Email verification link send on your email.',
        ]);
    }

    public function verify(Request $request)
    {

        if(!$request->user()->email_verified_at){
            $request->user()->forceFill([
                'email_verified_at' => now()
            ])->save();
        }

        return response()->json([
          'message' => 'Email verified successfylly.',
        ]);
    }
}
