<?php

namespace App\Http\Controllers;

use App\Filial;
use App\Http\Requests\FilialRequest;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', $request->user());
        $filials = Filial::all();

        return view('filials.index', compact('filials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', $request->user());
        $filial = new Filial();

        return view('filials.edit', compact('filial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilialRequest $request)
    {
        if ($request->id) {
            $this->authorize('update', Filial::whereId($request->id)->first());
        } else {
            $this->authorize('create', $request->user());
        }
        $filial = Filial::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'description' => $request->description,
            'display_name' => $request->display_name,
        ]);

        return redirect()->route('filials.index')
            ->with('message',
                trans('app.filials-updated'));
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
        $filial = Filial::findOrFail($id); //Get user with specified id
        $this->authorize('update', $filial);

        return view('filials.edit', compact('filial')); //pass user and roles data to view
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
        //Find a user with a given id and delete
        $filial = Filial::findOrFail($id);
        $this->authorize('delete', $filial);
        $filial->delete();

        return redirect()->route('filials.index')
            ->with('message',
                trans('app.filial-deleted'));
    }
}
