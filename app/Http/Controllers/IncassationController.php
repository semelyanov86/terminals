<?php

namespace App\Http\Controllers;

use App\Events\IncassationCreated;
use App\Http\Requests\IncassationRequest;
use App\Incassation;
use App\Transformers\IncassationTransformer;
use App\User;
use Illuminate\Http\Request;

class IncassationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $incassations = Incassation::latestFirst()->with('terminal')->sortByTerminal()->paginate(10);

        return view('incassations.index', compact('incassations'));
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
    public function store(IncassationRequest $request)
    {
        $incassation = new Incassation;
        $incassation->amount = $request->amount;
        $incassation->quantity = $request->quantity;
        $incassation->incassation_date = $request->incassation_date;
        $incassation->terminal()->associate($request->user());
        $incassation->user()->associate(User::whereId($request->user_id)->first());
        $incassation->save();
        event(new IncassationCreated($incassation));

        return fractal()
            ->item($incassation)
            ->parseIncludes(['terminal', 'user'])
            ->transformWith(new IncassationTransformer)
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
        //
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
