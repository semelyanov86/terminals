<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayerRequest;
use App\Payer;
use App\Transformers\PayerTranformer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

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
        $client = new Client(['http_errors' => false]);
        try {
            $response = $client->request('GET', config('app.onees_url') . 'ostatok/' . $agreement, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);
            $code = $response->getStatusCode();
            if ($code == '200') {
//            return $response->getBody();
                $res = json_decode($response->getBody());
                if ($res->result == 'ok') {
                    $payer = Payer::updateOrCreate(['onees' => $res->number], [
                        'chlvz' => $res->chlvz,
                        'full' => $res->full_oplata,
                        'mainsum' => $res->mainsum,
                        'name' => $res->fio,
                        'onees' => $res->number,
                        'procent' => $res->procent,
                        'prosrochka' => $res->prosrochka
                    ]);
                    $payer->save();
                    return fractal()
                        ->item($payer)
                        ->transformWith(new PayerTranformer)
                        ->toArray();
                } else {
                    abort(503);
                }
            } elseif ($code == '500') {
                abort(503, $response->getBody()->getContents());
            } elseif ($code == '404') {
                abort(404, trans('app.not-found'));
            } else {
                abort($code, $response->getBody());
            }
        } catch (GuzzleException $e) {
            abort($e->getCode(), $e->getMessage());
        }
    }
}
