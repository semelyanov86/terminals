<?php

namespace App\Http\Controllers;

use App\Transformers\TerminalTransformer;
use Illuminate\Http\Request;

class TerminalApiController extends Controller
{
    public function user(Request $request)
    {
        $user = $request->user();
        return fractal()->item($user)->transformWith(new TerminalTransformer)->toArray();
    }
}
