@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Информация о платёжном терминале</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Логин</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Имя</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->display_name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Описание</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->description}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Купюроприёмник</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->cashmashine}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Принтер</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->printer}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Папка с логами</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->log_path}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Модем</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->modem}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Категория</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->category->name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Филиал</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->filial->display_name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Отправлять уведомления</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->notifications_sub_display}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Временный пароль</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->tmp_pass}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Пароль инкассатора</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->inkasso_pass}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Терминал активен?</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->active_display}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Дата создания</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->created_at}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Дата обновления</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->updated_at}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>ID платёжного терминала</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$terminal->id}}</p>
                    </div>
                </div>

                <div class="form-group text-right m-b-0 mt-3">
                    @can('edit terminals')
                    <a class="btn btn-primary waves-effect waves-light" href="{{route('terminals.edit', ['id' => $terminal->id])}}">
                        Редактировать
                    </a>
                    @endcan
                    <a class="btn btn-default waves-effect m-l-5" href="{{route('terminals.index')}}">
                        Назад
                    </a>
                </div>

            </div> <!-- container -->

            @include('layouts.copyright')
        </div> <!-- content -->

    </div>
@endsection
