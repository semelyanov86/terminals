@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Информация о пайщике</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>ФИО пайщика</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Идентификатор в 1с</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->onees}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Дата обновления в базе</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->updated_at}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Членские взносы</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->chlvz}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Основной долг</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->mainsum}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Процент</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->procent}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Просрочка</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->prosrochka}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Общая сумма</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->full}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Дата создания</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$payer->created_at}}</p>
                    </div>
                </div>
                {{--<div class="row">
                    <div class="col-sm">
                        <p>Дата обновления</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->updated_at}}</p>
                    </div>
                </div>--}}

                <div class="form-group text-right m-b-0 mt-3">
                    <a class="btn btn-default waves-effect m-l-5" href="{{route('payers.index')}}">
                        Назад
                    </a>
                </div>

            </div> <!-- container -->

            @include('layouts.copyright')
        </div> <!-- content -->

    </div>
@endsection