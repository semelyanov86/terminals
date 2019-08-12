<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\TerminalCreated;
use App\Filial;
use App\Http\Requests\TerminalRequest;
use App\Payment;
use App\Terminal;
use App\Transformers\OstatkiTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $terminals = Terminal::with('filial')->when(request('filial'), function($query){
            return $query->where('filial_id', '=', request('filial'));
        })->when(request('category'), function ($query){
            return $query->where('category_id', request('category'));
        })->paginate(10);
        return view('terminals.terminals', compact('terminals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', auth()->user());
        $terminal = new Terminal();
        $filials = Filial::all();
        $categories = Category::all();
        return view('terminals.edit', compact('terminal', 'filials', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TerminalRequest $request)
    {
        if ($request->id) {
            $this->authorize('update', Terminal::whereId($request->id)->first());
        } else {
            $this->authorize('create', auth()->user());
        }

        $terminal = Terminal::updateOrCreate(['id' => $request->id], [
            'display_name' => $request->display_name,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'active' => $request->active ? '1' : '0',
            'filial_id' => $request->filial_id,
            'category_id' => $request->category_id,
            'log_path' => $request->log_path,
            'notifications' => $request->notifications ? '1' : '0',
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        $terminal->filial()->associate(Filial::findOrFail($request->filial_id));
        $terminal->category()->associate(Category::findOrFail($request->category_id));
        $terminal->save();
        event(new TerminalCreated($terminal));

        return redirect()->route('terminals.index')
            ->with('message',
                trans('app.terminals-updated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $terminal = Terminal::findOrFail($id);
        $this->authorize('view', $terminal);
        return view('terminals.show', compact('terminal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terminal = Terminal::findOrFail($id); //Get user with specified id
        $this->authorize('update', $terminal);
        $filials = Filial::all();
        $categories = Category::all();

        return view('terminals.edit', compact('terminal', 'filials', 'categories')); //pass user and roles data to view
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
        $terminal = Terminal::findOrFail($id);
        $this->authorize('delete', $terminal);
        $terminal->delete();

        return redirect()->route('terminals.index')
            ->with('message',
                'Terminal successfully deleted.');
    }

    public function getOstatki()
    {
        $terminals = Terminal::where('active', '=', '1')->get();
        return fractal()->collection($terminals)->parseIncludes('terminal')->transformWith(new OstatkiTransformer)->toArray();
    }
}
