<?php

namespace App\Http\Controllers;

use App\BlockedPhone;
use App\Http\Requests\BlockedPhoneRequest;
use Illuminate\Http\Request;

class BlockedPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $phones = BlockedPhone::paginate(5);
        return view('phones.index', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', auth()->user());
        $phone = new BlockedPhone();
        return view('phones.edit', compact('phone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlockedPhoneRequest $request)
    {
        if ($request->id) {
            $this->authorize('update', BlockedPhone::whereId($request->id)->first());
        } else {
            $this->authorize('create', auth()->user());
        }
        $phone = BlockedPhone::updateOrCreate(['id' => $request->id], [
            'phone' => $request->phone,
            'description' => $request->description,
        ]);

        return redirect()->route('phones.index')
            ->with('message',
                'Номер телефона успешно изменён');
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
        $phone = BlockedPhone::findOrFail($id); //Get user with specified id
        $this->authorize('update', $phone);

        return view('phones.edit', compact('phone')); //pass user and roles data to view
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
        $phone = BlockedPhone::findOrFail($id);
        $phone->delete();

        return redirect()->route('phones.index')
            ->with('message',
                'Номер телефона успешно удалён.');
    }
}
