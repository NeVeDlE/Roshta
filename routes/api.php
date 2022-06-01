<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',function(){
    $user=User::where('email',request()->email)->first();
    if(Hash::check(request()->password,$user->password)){
        return [
            "id"=> $user->id,
            "name"=>$user->name,
            "national_id"=> $user->national_id,
            "phone"=> $user->phone,
            "picture"=> $user->picture,
            "birthday"=> $user->birthday,
            "role_id"=> $user->role_id,
            "email"=> $user->email,
        ];
    }
    else {
        return 'Not Found';
    }

});
