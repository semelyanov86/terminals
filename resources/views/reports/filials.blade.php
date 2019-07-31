@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Отчёт по филиалам</h4>
                    </div>
                </div>

                <div class="row p-t-50">
                    <div class="col-12">
                        <div class="table-responsive">
                            <h4 class="font-14">Статистика по филиалам организации</h4>
                            <p class="text-muted font-13 m-b-30">
                                В данной таблице вы можете получить всю необходимоую отчётность в разрезе филиалов
                            </p>

                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название филиала</th>
                                    <th>Количество терминалов</th>
                                    <th>Сумма в терминалах</th>
                                    <th>Платежей всего</th>
                                    <th>Платежи месяц</th>
                                    <th>Платежи прошлый месяц</th>
                                    <th>Инкассации всего</th>
                                    <th>Инкассации месяц</th>
                                    <th>Сумма заявок на займ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($i = 0; $i < count($filials); $i++)
                                    <tr>
                                        <td>{{$filials[$i]['id']}}</td>
                                        <td>{{$filials[$i]['name']}}</td>
                                        <td>{{$filials[$i]['terminals']}}</td>
                                        <td>{{$filials[$i]['ostatok']}}</td>
                                        <td>{{$filials[$i]['payment_total']}}</td>
                                        <td>{{$filials[$i]['payment_month']}}</td>
                                        <td>{{$filials[$i]['payment_last']}}</td>
                                        <td>{{$filials[$i]['incasso_total']}}</td>
                                        <td>{{$filials[$i]['incasso_month']}}</td>
                                        <td>{{$filials[$i]['loans_total']}}</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.copyright')
        </div>
    </div>

@endsection