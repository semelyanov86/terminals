<?php

namespace App\Exports;

use App\Payment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Calculation\Database;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PaymentsExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $payments = Payment::where('uploaded_at', NULL)->get();
        $payments->each(function ($item, $key) {
            $item->uploaded_at = Carbon::now();
            $item->save();
        });
        return $payments;
    }

    public function headings(): array
    {
        return array(
            '#',
            'Agreement',
            'Terminal Id',
            'Uploaded At',
            'Filial Id',
            'Payer Id',
            'Sum',
            'Created At',
            'Updated At',
            'Payment Date',
            'Is Incassed',
            'FIO',
            'Is Saving',
            'Unique Number'
        );
    }

    public function map($payment): array
    {
        return array(
            (int) $payment->id,
            (string) $payment->agreement,
            (int) $payment->terminal_id,
            $payment->uploaded_at,
            $payment->filial_id,
            $payment->payer_id,
            $payment->sum,
            $payment->created_at,
            $payment->updated_at,
            $payment->payment_date,
            $payment->incassed,
            $payment->fio,
            $payment->is_saving,
            $payment->number
        );
    }

    public function columnFormats(): array
    {
        return array(

        );
    }
}
