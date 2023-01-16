<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

    public function cacheKey($key)
    {
        $value = Cache::get('cache-test');

        if (!$value) {
            $value = 'test value';
            Cache::put('cache-test', $value, 60);
        }

        dd($value);
    }

}
