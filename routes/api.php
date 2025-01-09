<?php

// use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
require __DIR__.'/auth.php';
// First Practice Api Authentication 
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/product/show', [ProductController::class, 'show']);

// Route::post('/register', function (Request $request) {
//     $register_data = $request->validate([
//         'name' => 'required|string',
//         'email' => 'required|email',
//         'password' => 'required|confirmed',
//     ]);
//     $register_data['password'] = bcrypt($register_data['password']);
//     $user = User::create($register_data);

//     $token = $user->createToken("apitokenfarhad");
//     return ['token' => $token->plainTextToken, 'status' => true, 'message' => 'User regirtered successfully.'];
// });

// Route::post('/login', function (Request $request) {
//     $login_user = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);
//     $user = User::where('email', $login_user['email'])->first();
//     if (!$user) {
//         return ['status' => 404, 'message' => 'User not found.'];
//     }
//     if (Hash::check($login_user['password'], $user->password)) {
//         Auth::login($user);
//         $token = $user->createToken("farhad");
//         return ['status' => true, 'message' => 'You successfully logged in', 'token' => $token->plainTextToken];
//     } else {
//         return ['status' => 403, 'message' => 'Invalid credintails given.'];
//     }
// });
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/product/store', [ProductController::class, 'store']);
//     Route::delete('/product/delete', [ProductController::class, 'destroy']);
//     Route::put('/product/update', [ProductController::class, 'update']);
//     Route::post('/logout', function (Request $request) {
//       $request->user()->tokens()->delete();;
//       return ['status' => 200, 'message' => 'Logout out successfylly.'];
//     });
// });

// Second Practice Api Authentication 



