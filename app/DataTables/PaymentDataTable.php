<?php

namespace App\DataTables;

use Akaunting\Money\Money;
use App\Incassation;
use App\Payment;
use App\Traits\Sortable;
use Yajra\DataTables\Services\DataTable;

class PaymentDataTable extends DataTable
{
    use Sortable;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('sum', function (Payment $payment) {
                return convertToMoney($payment->sum);
            });
//            ->addColumn('action', 'incassation.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Incassation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payment $model)
    {
        return $model->newQuery()->sortByDate()->with('terminal')->with('filial')->with('payer')->select('*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['export', 'excel', 'pdf', 'print', 'reset', 'reload'],
                        'language' => ['url' => 'http://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json'],
                    ])
                    ->minifiedAjax()
//                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

                'id' => ['title' => '#'],
                'payment_date' => ['title' => 'Дата платежи'],
                'sum' => ['title' => 'Сумма'],
                'agreement' => ['title' => 'Номер договора'],
                'terminal.display_name' => ['title' => 'Наименование терминала'],
                'payer.name' => ['title' => 'Пайщик'],
                'created_at' => ['title' => 'Дата регистрации'],
            'filial.name' => ['title' => 'Филиал'],
            'is_saving' => ['title' => 'Сбережения'],
            'number' => ['title' => 'Номер трансакции'],
//                'updated_at' => 'Дата изменения'

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Payment_'.date('YmdHis');
    }
}
