<?php

namespace App\Jobs;

use App\Payment;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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
        $res = $client->get(config('app.onees_url') . 'platezh?' . 'id=' . $this->payment->terminal_id . '&fio=' . $this->payment->fio . '&summa=' . $this->payment->sum  . '&dogovor=' . $this->payment->agreement);
        if ($res->getStatusCode() == 200) {
            $this->payment->uploaded_at = Carbon::now();
            $this->payment->save();
        } elseif($res->getStatusCode() == 200) {
            info(trans('app.agreement-not-found') . $this->payment->agreement);
        } else {
            info($res->getBody());
        }
    }

    /**
     * Determine the time at which the job should timeout.
     *
     * @return \DateTime
     */
/*    public function retryUntil()
    {
        return now()->addSeconds(5);
    }*/
}
