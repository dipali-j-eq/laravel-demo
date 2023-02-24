<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CustomAuthController;
use Illuminate\Http\Request;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::post('/check-login', function (Request $request) {
    
    // $data = Request::createFromGlobals()->all();
    // print_r($data);
    // return view('auth/login', $data);

    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    $recordCount = User::where('username', '=' ,$data['username'])->first();
    // $credentials = $request->only('username', 'password');

    if ($recordCount) {
        return redirect("admin/dashbord");
    }
    else
    {   
        return redirect("/")->withErrors('Login details are not valid');
    }
    


});

// Route::get('/greeting', function () {
//     return 'Hello World';
// });

// Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
// Route::get('login', [CustomAuthController::class, 'index'])->name('login');
// Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
// Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
// Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
// Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');