<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Loan;
use App\Terminal;
use App\Transformers\LoanTransformer;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        if (request('all')) {
            $loans = Loan::latestFirst()->paginate(10);
        } else {
            $loans = Loan::where('approved', '0')->paginate(10);
        }
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request)
    {
        $loan = new Loan;
        $loan->amount = $request->amount;
        $loan->approved = $request->approved;
        $loan->phone = $request->phone;
        $loan->terminal()->associate($request->user());
        $loan->save();

        return fractal()
            ->item($loan)
            ->transformWith(new LoanTransformer)
            ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $this->authorize('update', $loan);
        $loan->approved = $request->approved;
        $loan->save();
        return redirect()->route('loans.index')
            ->with('message',
                'База заявок успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
