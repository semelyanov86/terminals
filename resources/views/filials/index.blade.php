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
                                    <h6 class="m-t-0">Управление филиалами организации</h6>
                                </div>
                                @can('create filials')
                                    <div class="col-sm text-right align-content-end">
                                        <a type="button" class="btn btn-primary" href="{{ route('filials.create') }}">Добавить новый филиал</a>
                                    </div>
                                @endcan
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-hover mails m-0 table table-actions-bar">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Наименование</th>
                                        <th>Отображаемое имя</th>
                                        <th>Описание</th>
                                        <th>Дата обновления</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($filials as $filial)
                                        <tr>
                                            <td>
                                                {{$filial->id}}
                                            </td>

                                            <td>
                                                {{$filial->name}}
                                            </td>

                                            <td>
                                                {{$filial->display_name}}
                                            </td>

                                            <td>
                                                {{$filial->description}}
                                            </td>

                                            <td>
                                                {{$filial->updated_at}}
                                            </td>
                                            <td>
                                                @can('edit filials')
                                                    <a class="btn btn-icon btn-default" href="{{route('filials.edit', ['id' => $filial->id])}}"> <i class="fa fa-pencil-square-o"></i> </a>
                                                @endcan
                                                @can('delete configs')
                                                    <form method="post" action="{{route('filials.destroy', $filial->id)}}" style="display: inline;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Вы уверены что хотите удалить этот филиал?')"> <i class="fa fa-remove"></i> </button>
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