@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Отчёт по пайщикам</h4>
                    </div>
                </div>

                <div class="row p-t-50">
                    <div class="col-12">
                        <div class="table-responsive">
                            <h4 class="font-14">Статистика по пайщикам организации (ТОП-100)</h4>
                            <p class="text-muted font-13 m-b-30">
                                В данной таблице вы можете получить статистику в разрезе пайщиков
                            </p>

                            <form name="daterange-form" action="{{route('report.payers')}}" method="get">
                                <div class="row form-group m-t-50">
                                    @csrf
                                    <div class="col-md-8">
                                        <div>
                                            <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="{{request('daterange')}}"/>
                                        </div>
                                        <label>Выберите диапазон дат</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div></div>
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="filter" id="filter">
                                            Фильтровать
                                        </button>
                                        <a type="button" href="{{route('report.payments')}}" class="btn btn-default waves-effect m-l-5">
                                            Сбросить
                                        </a>
                                    </div>

                                </div>
                            </form>

                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя пайщика</th>
                                    <th>Количество платежей</th>
                                    <th>Сумма платежей</th>
                                    <th>Остаток по займу</th>
                                    <th>Номер в 1с</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($i = 0; $i < $count; $i++)
                                    <tr>
                                        <td>{{$payments[$i]['id']}}</td>
                                        <td>{{$payments[$i]['name']}}</td>
                                        <td>{{$payments[$i]['count']}}</td>
                                        <td>{{$payments[$i]['total']}}</td>
                                        <td>{{$payments[$i]['full']}}</td>
                                        <td>{{$payments[$i]['onees']}}</td>
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