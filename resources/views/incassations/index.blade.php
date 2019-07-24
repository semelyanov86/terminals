@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title">Список инкассаций</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="m-b-20">
                                    <h6 class="font-14 mt-4">Таблица с инкассациями</h6>
                                    <p class="text-muted font-13 m-b-20">
                                        Здесь показаны все инкассации
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-50">
                            <div class="col-lg-12">
                                <div class="m-b-20">
                                    <h5 class="font-14">Таблица инкассаций</h5>

                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Дата</th>
                                                <th>Терминал</th>
                                                <th>Сумма</th>
                                                <th>Количество купюр</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($incassations as $incassation)
                                            <tr>
                                                <th scope="row">{{$incassation->id}}</th>
                                                <td>{{$incassation->created_at}}</td>
                                                <td><a href="{{route('incassations.index', ['terminal' => $incassation->terminal->id])}}">{{$incassation->terminal->display_name}}</a></td>
                                                <td>{{$incassation->amount}}</td>
                                                <td>{{$incassation->quantity}}</td>

                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $incassations->links() }}
                                    </div>
                                    @if(request('terminal'))
                                        <p>Внимание! Активирован фильтр записей. <a href="{{route('incassations.index')}}">Показать записи без фильтра</a></p>
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