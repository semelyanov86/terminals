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
                                    <h6 class="m-t-0">Перечень конфигурации системы</h6>
                                </div>
                                @can('create configs')
                                    <div class="col-sm text-right align-content-end">
                                        <a type="button" class="btn btn-primary" href="{{ route('configs.create') }}">Добавить новую конфигурацию</a>
                                    </div>
                                @endcan
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-hover mails m-0 table table-actions-bar">
                                    <thead>
                                    <tr>
                                        <th>Экран</th>
                                        <th>Наименование</th>
                                        <th>Сервер</th>
                                        <th>Опубликовано</th>
                                        <th>Дата обновления</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($configs as $config)
                                        <tr>
                                            <td>

                                                <img src="{{asset('/storage/images')}}/{{$config->first_image->filename}}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                                            </td>

                                            <td>
                                                <a href="{{route('configs.show', ['id' => $config->id])}}" class="text-muted">{{$config->name}}</a>
                                            </td>

                                            <td>
                                                <a href="#" class="text-muted">{{$config->server}}</a>
                                            </td>

                                            <td>
                                                <b>{{$config->published_display}}</b>
                                            </td>

                                            <td>
                                                {{$config->updated_at}}
                                            </td>
                                            <td>
                                                @can('edit configs')
                                                    <a class="btn btn-icon btn-default" href="{{route('configs.edit', ['id' => $config->id])}}"> <i class="fa fa-pencil-square-o"></i> </a>
                                                @endcan
                                                @can('delete configs')
                                                    <form method="post" action="{{route('configs.destroy', $config->id)}}" style="display: inline;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Вы уверены что хотите удалить конфигурацию?')"> <i class="fa fa-remove"></i> </button>
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