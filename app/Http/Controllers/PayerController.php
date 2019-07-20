<?php

namespace App\Http\Controllers;

use App\Payer;
use Illuminate\Http\Request;

class PayerController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $payers = Payer::orderBy('updated_at', 'DESC')->paginate(10);
        return view('payers', compact('payers'));
    }
}
