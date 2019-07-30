<?php

namespace App\Http\Controllers;

use App\Config;
use App\ConfigImage;
use App\Events\TerminalActivated;
use App\Http\Requests\ActivateRequest;
use App\Http\Requests\ConfigRequest;
use App\Http\Requests\StateRequest;
use App\Terminal;
use App\Transformers\ConfigTransformer;
use App\Transformers\TerminalTransformer;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', auth()->user());
        $configs = Config::with('images')->get();
        return view('configs.index', compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', auth()->user());
        $config = new Config();
        return view('configs.edit', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigRequest $request)
    {
        if ($request->id) {
            $this->authorize('update', Config::whereId($request->id)->first());
        } else {
            $this->authorize('create', auth()->user());
        }
        $config = Config::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'phone' => $request->phone,
            'server' => $request->serverName,
            'company' => $request->company,
            'website' => $request->website,
            'ping_block' => $request->ping_block ? '1' : '0',
            'printer_block' => $request->printer_block ? '1' : '0',
            'published' => $request->published ? '1' : '0'
        ]);
        if ($request->hasFile('images')) {
            if ($request->id) {
                $this->deleteImages($request->id);
            }
            $iteration = 1;
            foreach ($request->images as $photo) {
                $filename = $config->id.$iteration.'_image'.time().'.'.$photo->getClientOriginalExtension();
                $photo->storeAs('public/images',$filename);
                ConfigImage::create([
                    'config_id' => $config->id,
                    'filename' => $filename
                ]);
                $iteration++;
            }
        }

        return redirect()->route('configs.index')
            ->with('message',
                'Конфигурация успешно изменена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = Config::findOrFail($id);
        $this->authorize('view', $config);
        return view('configs.show', compact('config'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', auth()->user());
        $config = Config::findOrFail($id);
        return view('configs.edit', compact('config'));
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
        $config = Config::findOrFail($id);
        $this->authorize('delete', $config);
        $images = $this->deleteImages($id);
        $config->delete();

        return redirect()->route('configs.index')
            ->with('message',
                'Configuration successfully deleted.');
    }

    private function deleteImages($id)
    {
        $images = ConfigImage::where('config_id', '=', $id)->get()->each(function($item, $key){
            $item->delete();
        });
        return $images;
    }

    public function activate(ActivateRequest $request)
    {
        $config = Config::where('published', '=', '1')->first();
        $this->authorize('activate', $config);
        $terminal = Terminal::whereId(request()->user()->id)->update([
           'cashmashine' => $request->cashmashine,
            'cashmashine_state' => $request->cashmashine_state,
            'modem' => $request->modem,
            'printer' => $request->printer,
            'printer_state' => $request->printer_state
        ]);
        event(new TerminalActivated(request()->user()));
        return fractal()->item($config)->parseIncludes(['terminal', 'configImage'])->transformWith(new ConfigTransformer())->toArray();
    }

    public function state(StateRequest $request)
    {
        $terminal = Terminal::whereId(request()->user()->id)->first();
        $terminal->cashmashine_state = $request->cashmashine_state;
        $terminal->printer_state = $request->printer_state;
        $terminal->update_state = $request->update_state;
        $terminal->save();
        return fractal()->item($terminal)->transformWith(new TerminalTransformer)->toArray();
    }
}
