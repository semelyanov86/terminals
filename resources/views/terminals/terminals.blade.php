@extends('master')

@section('content')
<div class="content-page">
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
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm">
                                <h6 class="m-t-0">Список платёжных терминалов</h6>
                            </div>
                            @can('create terminals')
                            <div class="col-sm text-right align-content-end">
                                <a type="button" class="btn btn-primary" href="{{ route('terminals.create') }}">Добавить терминал</a>
                            </div>
                                @endcan
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-hover mails m-0 table table-actions-bar">
                                <thead>
                                <tr>
                                    <th>Логин</th>
                                    <th>Отображаемое Имя</th>
                                    <th>Филиал</th>
                                    <th>Категория</th>
                                    <th>Активен</th>
                                    <th>Пользователь</th>
                                    <th>Дата авторизации</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($terminals as $terminal)
                                <tr>
                                    <td>
                                        <a href="{{route('terminals.show', ['id' => $terminal->id])}}" class="text-muted">{{$terminal->name}}</a>
                                    </td>

                                    <td>
                                        <a href="{{route('terminals.show', ['id' => $terminal->id])}}" class="text-muted">{{$terminal->display_name}}</a>
                                    </td>

                                    <td>
                                        <a href="{{route('terminals.index', ['filial' => $terminal->filial_id])}}">{{$terminal->filial->display_name}}</a>
                                    </td>

                                    <td>
                                        <b><a href="{{route('terminals.index', ['category' => $terminal->category_id])}}">{{$terminal->category->name}}</a></b>
                                    </td>
                                    <td>
                                        {{$terminal->active_display}}
                                    </td>
                                    <td>
                                        {{$terminal->user->name}}
                                    </td>

                                    <td>
                                        {{$terminal->auth_date}}
                                    </td>
                                    <td>
                                        @can('edit terminals')
                                        <a class="btn btn-icon btn-default" href="{{route('terminals.edit', ['id' => $terminal->id])}}"> <i class="fa fa-pencil-square-o"></i> </a>
                                        @endcan
                                            @can('delete terminals')
                                        <form method="post" action="{{route('terminals.destroy', $terminal->id)}}" style="display: inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Вы уверены что хотите удалить платёжный терминал?')"> <i class="fa fa-remove"></i> </button>
                                        </form>
                                                @endcan

                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $terminals->links() }}
                        </div>
                        @if(request('filial') or request('category'))
                            <p>Внимание! Активирован фильтр записей. <a href="{{route('terminals.index')}}">Показать записи без фильтра</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection