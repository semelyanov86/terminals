<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayerRequest;
use App\Payer;
use Illuminate\Http\Request;

class PayerController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $payers = Payer::latestFirst()->paginate(10);
        return view('payers.index', compact('payers'));
    }

    public function show($id)
    {
        $payer = Payer::findOrFail($id);
        $this->authorize('view', $payer);
        return view('payers.show', compact('payer'));
    }

    public function store(PayerRequest $request)
    {
        $agreement = $request->agreement;
        return $request;
    }
}
