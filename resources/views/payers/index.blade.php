@extends('master')

@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title">Реестр пайщиков</h4>
                        <div class="row p-t-50">
                            <div class="col-lg-12">
                                <div class="m-b-20">
                                    <h5 class="font-14">Последние загруженные пайщики</h5>
                                    <p class="text-muted font-13 m-b-20">
                                        В данной таблице перечислены последние импортированные пайщики из базы 1С
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ФИО</th>
                                                <th>Общая сумма</th>
                                                <th>Сумма остатка</th>
                                                <th>Дата обновления</th>
                                                <th>Дата создания</th>
                                                <th>Членские</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payers as $payer)
                                            <tr>
                                                <th scope="row">{{$payer->id}}</th>
                                                <td><a href="{{route('payers.show', ['id' => $payer->id])}}">{{$payer->name}}</a></td>
                                                <td>{{$payer->full}}</td>
                                                <td>{{$payer->mainsum}}</td>
                                                <td>{{$payer->updated_at}}</td>
                                                <td>{{$payer->created_at}}</td>
                                                <td>{{$payer->chlvz}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$payers->links()}}
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.copyright')
        </div>
    </div>

@endsection