<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\ChatEvent;
use LRedis;

class ChatController extends Controller
{
    private $redis;

    public function __construct()
    {
        $this->redis = LRedis::connection();
    }

    protected function chat(Request $request)
    {
        event(new ChatEvent($request->get('message')));

        return ['status' => true];
    }

    protected function demo()
    {
        dd(json_decode($this->redis->get('1/2')));
    }
}
