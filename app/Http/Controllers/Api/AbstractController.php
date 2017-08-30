<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbstractController extends Controller
{
    private $user;

    public function __construct()
    {

    }

    public function getUser(Request $request)
    {
        return response()->json([
            'http_status' => 200,
            'user' => auth()->user()
        ]);
    }
}
