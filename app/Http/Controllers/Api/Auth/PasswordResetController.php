<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\PasswordResetEmail;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{

  public function sendResetLink(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email', Rule::exists(User::class, 'email')],
    ]);

    $url = URL::temporarySignedRoute('password.reset', now()->addMinutes(30), ['email', $request->email]);
    $url = str_replace(env('APP_URL'), env('FRONTEND_URL'), $url);

    Mail::to($request->email)->send(new PasswordResetEmail($url));

    return response()->json([
      'message' => 'Reset password link sent on your email.',
    ]);
  }

  public function reset(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email', Rule::exists(User::class, 'email')],
      'password' => 'required|min:5|confirmed'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
      return response()->json([
        'message' => 'User not found.',
      ], 401);
    }

    $user->password = Hash::make($request->password);
    $user->save();
    return response()->json([
      'message' => 'Password reset successfully.',
    ], 200);
  }
}
