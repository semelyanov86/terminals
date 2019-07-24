@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title">Заявки на займ</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="m-b-20">
                                    <h6 class="font-14 mt-4">Список заявок</h6>
                                    <p class="text-muted font-13 m-b-20">
                                        @if(request('all'))
                                            Показаны все заявки. <a href="{{route('loans.index')}}">Показать только необработанные</a>
                                            @else
                                            По умолчанию отображаются только необработанные заявки. <a href="{{route('loans.index', ['all' => 1])}}">Показать все заявки</a>
                                            @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-50">
                            <div class="col-lg-12">
                                <div class="m-b-20">
                                    <h5 class="font-14">Таблица заявок на займ</h5>

                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Номер телефона</th>
                                                <th>Терминал</th>
                                                <th>Сумма займа</th>
                                                <th>Дата</th>
                                                <th>Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($loans as $loan)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$loan->phone}}</td>
                                                <td>{{$loan->terminal->display_name}}</td>
                                                <td>{{$loan->amount}}</td>
                                                <td>{{$loan->created_at}}</td>
                                                <td><form method="post" action="{{route('loans.update', ['id' => $loan->id])}}" style="display: inline;">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="id" id="id" value="{{$loan->id}}">
                                                        <input type="hidden" name="approved" id="approved" value="1">
                                                        <button type="submit" class="btn btn-icon btn-danger"> <i class="fa fa-send"></i> </button>
                                                    </form></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $loans->links() }}
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection