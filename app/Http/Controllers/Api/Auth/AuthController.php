<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\AbstractController;
use App\Services\PassportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends AbstractController
{
    protected $dataSelected = [
        'id',
        'name',
        'email',
        'birthday',
        'address',
        'phone',
        'url_file',
    ];

    public function __construct()
    {
        // parent::__construct($userRepository);
    }

    public function login(Request $request, PassportService $passport)
    {
        $data = $request->only('email', 'password');
        // dd($data ád);
        // $passport = new PassportService();
        dd($passport->requestGrantToken($data));
        // // $user = $this->repository->select($this->dataSelected)->where('email', $data['email'])
        // //     ->with(['roles' => function ($query) {
        // //         $query->where('type', Role::TYPE_SYSTEM);
        // //     }])
        // //     ->first();
        $user = \App\Models\User::where(['email' => $data['email']])->first();

        if (!$user) {
            throw new Exception('Not Found user');
        }

        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            throw new UnknowException('User not active or credential invalid');
        }

        return response()->json([
            'status' => 200,
            'user' => Auth::user(),
            // 'access_token' => $passport->requestGrantToken($data),
        ]);

        // // return $this->getData(function () use ($passport, $data, $user) {
        // //     $this->compacts['auth'] = $passport->requestGrantToken($data);
        // //     $this->compacts['user'] = $user;
        // // });
    }

    // public function logout()
    // {
    //     if (!$this->user) {
    //         throw new UnknowException('Access token was invalid');
    //     }
    //     try {
    //         $this->user->token()->revoke();
    //         LRedis::publish('activies', json_encode([
    //             'userId' => $this->user->id,
    //             'status' => false,
    //         ]));
    //     } catch (Exception $e) {
    //         return $this->responseFail();
    //     }
    //     return $this->trueJson();
    // }

    public function demo()
    {
        dd(Auth::guard('api')->user());
    }
}
