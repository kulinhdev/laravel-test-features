<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function setKey($key, $value)
    {
        Redis::set($key, $value);
        return redirect()->back()->with('success', 'Key ' . $key . ' has been set with value ' . $value);
    }

    public function getKey($key)
    {
        $value = Redis::get($key);
        return view('redis', compact('key', 'value'));
    }

    public function deleteKey($key)
    {
        Redis::del($key);
        return redirect()->back()->with('success', 'Key ' . $key . ' has been deleted');
    }

    public function test()
    {
        Redis::set('name1', 'Taylor');

        $values = Redis::get('name');

        dd($values);
    }

}
