@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Добро пожаловать !</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box widget-inline">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-primary mdi mdi-access-point-network"></i> <b>{{convertToMoney($data['ostatok'])}}</b></h3>
                                        <p class="text-muted">Сумма в терминалах</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-custom mdi mdi-airplay"></i> <b>{{convertToMoney($data['loans_count'])}}</b></h3>
                                        <p class="text-muted">Заявок на займ</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-info mdi mdi-black-mesa"></i> <b>{{convertToMoney($data['payments_count'])}}</b></h3>
                                        <p class="text-muted">Всего платежей на сумму</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center b-0">
                                        <h3 class="m-t-10"><i class="text-danger mdi mdi-cellphone-link"></i> <b>{{convertToMoney($data['payers_sum'])}}</b></h3>
                                        <p class="text-muted">Портфель займов в терминалах</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!--end row -->


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h6 class="m-t-0">Остатки по платёжным терминалам</h6>
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
{{--                                    <li class="list-inline-item">
                                        <p class="font-normal"><i class="fa fa-circle m-r-10 text-primary"></i>Series A</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="font-normal"><i class="fa fa-circle m-r-10 text-muted"></i>Series B</p>
                                    </li>--}}
                                </ul>
                            </div>
                            <div id="dashboard-bar-stacked" class="morris-chart" style="height: 300px;"></div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h6 class="m-t-0">Динамика платежей</h6>
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
{{--                                    <li class="list-inline-item">
                                        <p class="font-weight-bold"><i class="fa fa-circle m-r-10 text-primary"></i>Mobiles</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="font-weight-bold"><i class="fa fa-circle m-r-10 text-info"></i>Tablets</p>
                                    </li>--}}
                                </ul>
                            </div>
                            <div id="dashboard-line-chart" class="morris-chart" style="height: 300px;"></div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row">
                    <div class="col-lg-6">

                        <div class="m-b-20">
                            <h5 class="font-14"><b>Проблемные терминалы</b></h5>
                            <p class="text-muted font-13 m-b-20">
                                Здесь отображаются терминалы, с которыми есть потенциальные проблемы.
                            </p>

                            <table class="table table table-hover m-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название терминала</th>
                                    <th>Купюроприёмник</th>
                                    <th>Принтер</th>
                                    <th>Обновлён</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['terminals'] as $terminal)
                                <tr>
                                    <th scope="row">{{$terminal->id}}</th>
                                    <td><a href="{{route('terminals.show', ['id' => $terminal->id])}}">{{$terminal->display_name}}</a></td>
                                    <td>{{$terminal->cashmashine_display}}</td>
                                    <td>{{$terminal->printer_display}}</td>
                                    <td>{{$terminal->update_state}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div> <!-- container -->


            <div class="footer">
                <div class="pull-right hide-phone">
                    Project Completed <strong class="text-custom">57%</strong>.
                </div>
                <div>
                    <strong>Simple Admin</strong> - Copyright © 2017 - 2019
                </div>
            </div>

        </div> <!-- content -->

    </div>
@endsection