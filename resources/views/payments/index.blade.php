@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-white alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title">Список платежей</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="m-b-20">
                                    <h6 class="font-14 mt-4">Таблица с платежами</h6>
                                    <p class="text-muted font-13 m-b-20">
                                        Здесь показана история платежей. Вы также можете найти платёж по его номеру, введя номер в поле ввода.
                                        <a href="{{route('payments.index', ['savings' => 'on'])}}"> Показать платежи по сбережениям</a> или <a href="{{route('payments.index', ['loans' => 'on'])}}"> Показать платежи по займам</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 text-right align-content-end">
                                <a href="{{route('payments.send')}}" class="btn btn-outline-primary">Отправить в 1С</a>
                            </div>
                        </div>
                        <form method="get" action="{{route('payments.index')}}" style="display: inline;">
                            @csrf
                            <div class="form-group row">
                                <div class="input-group m-t-10 col-3">
                                    <input type="number" id="example-input2-group2" name="id" class="form-control" min="1" placeholder="10">
                                    <span class="input-group-append">
                                                    <button type="submit" class="btn btn-primary">Поиск</button>
                                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="row p-t-50">
                            <div class="col-lg-12">
                                <div class="m-b-20">
                                    <h5 class="font-14">Таблица платежей</h5>

                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Дата платежа</th>
                                                <th>Терминал</th>
                                                <th>Номер договора</th>
                                                <th>Плательщик</th>
                                                <th>Сумма</th>
                                                <th>Дата регистрации</th>
                                                <th>Дата выгрузки</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payments as $payment)
                                            <tr>
                                                <th scope="row">{{$payment->id}}</th>
                                                <td>{{$payment->payment_date}}</td>
                                                <td><a href="{{route('payments.index', ['terminal' => $payment->terminal->id])}}">{{$payment->terminal->display_name}}</a></td>
                                                <td><a href="{{route('payments.index', ['agreement' => $payment->agreement])}}">{{$payment->agreement}}</a></td>
                                                <td><a href="{{route('payers.show', ['id' => $payment->payer->id])}}">{{$payment->payer->name}}</a></td>
                                                <td>{{$payment->sum}}</td>
                                                <td>{{$payment->created_at}}</td>
                                                <td>{{$payment->uploaded_at}}</td>

                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $payments->links() }}
                                    </div>
                                    @if(request('terminal') or request('agreement') or request('id'))
                                        <p>Внимание! Активирован фильтр записей. <a href="{{route('payments.index')}}">Показать записи без фильтра</a></p>
                                    @endif
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
