@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title">Список платежей</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="m-b-20">
                                    <h6 class="font-14 mt-4">Таблица с платежами</h6>
                                    <p class="text-muted font-13 m-b-20">
                                        Здесь показана история платежей
                                    </p>
                                </div>
                            </div>
                        </div>
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
                                    @if(request('terminal') or request('agreement'))
                                        <p>Внимание! Активирован фильтр записей. <a href="{{route('payments.index')}}">Показать записи без фильтра</a></p>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection