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
                                <h6 class="m-t-0">Пользователи системы</h6>
                            </div>
                            @can('create users')
                            <div class="col-sm text-right align-content-end">
                                <a type="button" class="btn btn-primary" href="{{ route('users.create') }}">Добавить нового</a>
                            </div>
                                @endcan
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-hover mails m-0 table table-actions-bar">
                                <thead>
                                <tr>
                                    {{--<th style="min-width: 95px;">
                                        <div class="checkbox checkbox-primary checkbox-single m-r-15">
                                            <input id="action-checkbox" type="checkbox">
                                            <label for="action-checkbox"></label>
                                        </div>
                                    </th>--}}
                                    <th>Аватар</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Роль</th>
                                    <th>Дата регистрации</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
{{--                                        <div class="checkbox checkbox-primary m-r-15">
                                            <input id="checkbox2" type="checkbox">
                                            <label for="checkbox2"></label>
                                        </div>--}}

                                        <img src="{{asset('/storage/avatars')}}/{{$user->image}}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                                    </td>

                                    <td>
                                        <a href="{{route('users.view', ['id' => $user->id])}}" class="text-muted">{{$user->name}}</a>
                                    </td>

                                    <td>
                                        <a href="#" class="text-muted">{{$user->email}}</a>
                                    </td>

                                    <td>
                                        <b><b>{{$user->first_role}}</b> </b>
                                    </td>

                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td>
                                        @can('edit users')
                                        <a class="btn btn-icon btn-default" href="{{route('users.edit', ['id' => $user->id])}}"> <i class="fa fa-pencil-square-o"></i> </a>
                                        @endcan
                                            @can('delete users')
                                        <form method="post" action="{{route('users.destroy', $user->id)}}" style="display: inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Вы уверены что хотите удалить пользователя?')"> <i class="fa fa-remove"></i> </button>
                                        </form>
                                                @endcan

                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection