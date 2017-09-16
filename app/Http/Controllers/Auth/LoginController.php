<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\PassportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request, PassportService $passport)
    // {
    //     $data = $request->only('email', 'password');

    //     // $user = $this->repository->select($this->dataSelected)->where('email', $data['email'])
    //     //     ->with(['roles' => function ($query) {
    //     //         $query->where('type', Role::TYPE_SYSTEM);
    //     //     }])
    //     //     ->first();
    //     $user = \App\Models\User::where(['email' => $data['email']])->first();

    //     if (!$user) {
    //         throw new NotFoundException('Not Found user');
    //     }

    //     if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
    //         throw new UnknowException('User not active or credential invalid');
    //     }

    //     // return $this->getData(function () use ($passport, $data, $user) {
    //     //     $this->compacts['auth'] = $passport->requestGrantToken($data);
    //     //     $this->compacts['user'] = $user;
    //     // });

    //     return response()->json([
    //         'auth' => $passport->requestGrantToken($data),
    //         'user' => $user,
    //     ]);
    // }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        // $user = $this->repository->select($this->dataSelected)->where('email', $data['email'])
        //     ->with(['roles' => function ($query) {
        //         $query->where('type', Role::TYPE_SYSTEM);
        //     }])
        //     ->first();
        $user = \App\Models\User::where(['email' => $data['email']])->first();

        if (!$user) {
            throw new NotFoundException('Not Found user');
        }

        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            throw new UnknowException('User not active or credential invalid');
        }

        return redirect('/home');
    }
}
