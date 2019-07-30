<?php

namespace App\DataTables;

use Akaunting\Money\Money;
use App\Incassation;
use Yajra\DataTables\Services\DataTable;

class IncassationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('amount', function(Incassation $incassation){
                return Money::RUB($incassation->amount);
            });
//            ->addColumn('action', 'incassation.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Incassation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Incassation $model)
    {
        return $model->newQuery()->with('terminal')->with('terminal.filial')->with('user')->select("*");
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
                'incassation_date' => ['title' => 'Дата инкассации'],
                'amount' => ['title' => 'Сумма'],
                'quantity' => ['title' => 'Количество купюр'],
                'terminal.display_name' => ['title' => 'Наименование терминала'],
                'user.name' => ['title' => 'Пользователь'],
                'created_at' => ['title' => 'Дата регистрации'],
            'terminal.filial.name' => ['title' => 'Филиал']
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
        return 'Incassation_' . date('YmdHis');
    }
}
