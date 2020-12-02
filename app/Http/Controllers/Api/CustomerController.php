<?php

namespace App\Http\Controllers\Api;

use App\Jobs\TestJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        for($i = 0; $i < 10; $i++) {
            dispatch(new TestJob($request->get('name') . $i))->onQueue("podcasts");
        }

        return $request->get('name') . PHP_EOL;
    }
}