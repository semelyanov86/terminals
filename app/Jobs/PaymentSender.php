<?php

namespace App\Jobs;

use App\Payment;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PaymentSender implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payment;
    public $tries = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
//    public $timeout = 30;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client();
        try {
            $res = $client->get(config('app.onees_url') . 'platezh?' . 'id=' . $this->payment->terminal_id . '&fio=' . $this->payment->fio . '&summa=' . $this->payment->sum . '&dogovor=' . $this->payment->agreement . '&transaction=' . $this->payment->number . 'dp=' . $this->payment->payment_date);
//            $res = $client->post(config('app.onees_url') . 'platezh?' . 'id=' . $this->payment->terminal_id . '&fio=' . $this->payment->fio . '&summa=' . $this->payment->sum  . '&dogovor=' . $this->payment->agreement . '&transaction=' . $this->payment->number);
            /*$res = $client->post(config('app.onees_url') . 'platezh', array(
                'form_params' => array(
                    'id' => $this->payment->terminal_id,
                    'fio' => $this->payment->fio,
                    'summa' => $this->payment->sum,
                    'dogovor' => $this->payment->agreement,
                    'transaction' => $this->payment->number
                )
            ));*/
            if ($res->getStatusCode() == 200) {
                $this->payment->uploaded_at = Carbon::now();
                $this->payment->save();
                info(trans('app.agreement-export-success').$this->payment->agreement);
            } elseif ($res->getStatusCode() == 404) {
                info(trans('app.agreement-not-found').$this->payment->agreement);
            } elseif ($res->getStatusCode() == 500) {
                info(trans('app.agreement-export-error').$this->payment->agreement);
            } else {
                info(trans('app.agreement-export-other-error').$this->payment->agreement);
            }
        } catch (RequestException $ex) {
            if ($ex->getCode() == 404) {
                info(trans('app.agreement-not-found').$this->payment->agreement.' message: '.$ex->getMessage());
            } elseif ($ex->getCode() == 500) {
                info(trans('app.agreement-export-error').$this->payment->agreement.' message: '.$ex->getMessage());
            } else {
                info(trans('app.agreement-export-other-error').$this->payment->agreement.' error code: '.$ex->getCode().' message: '.$ex->getMessage());
            }
        }
    }

    /*
     * Determine the time at which the job should timeout.
     *
     * @return \DateTime
     */
/*    public function retryUntil()
    {
        return now()->addSeconds(5);
    }*/
}
