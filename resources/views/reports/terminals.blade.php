@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Отчёт по терминалам</h4>
                    </div>
                </div>

                <div class="row p-t-50">
                    <div class="col-12">
                        <div class="table-responsive">
                            <h4 class="font-14">Статистика платёжных терминалов</h4>
                            <p class="text-muted font-13 m-b-30">
                                В данной таблице вы можете получить всю необходимоую отчётность по терминалам
                            </p>

                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название терминала</th>
                                    <th>Филиал</th>
                                    <th>Сумма в терминале</th>
                                    <th>Платежей всего</th>
                                    <th>Платежи месяц</th>
                                    <th>Платежи прошлый месяц</th>
                                    <th>Инкассации всего</th>
                                    <th>Инкассации месяц</th>
                                    <th>Сумма заявок на займ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($i = 0; $i < count($terminals); $i++)
                                    <tr>
                                        <td>{{$terminals[$i]['id']}}</td>
                                        <td>{{$terminals[$i]['name']}}</td>
                                        <td>{{$terminals[$i]['filial']}}</td>
{{--                                        <td>@money($terminals[$i]['ostatok'], 'RUB')</td>--}}
                                        <td>{{$terminals[$i]['ostatok']}}</td>
                                        <td>{{$terminals[$i]['payment_total']}}</td>
                                        <td>{{$terminals[$i]['payment_month']}}</td>
                                        <td>{{$terminals[$i]['payment_last']}}</td>
                                        <td>{{$terminals[$i]['incasso_total']}}</td>
                                        <td>{{$terminals[$i]['incasso_month']}}</td>
                                        <td>{{$terminals[$i]['loans_total']}}</td>
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