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
                                    <h6 class="m-t-0">Перечень заблокированных номеров</h6>
                                </div>
                                @can('create phones')
                                    <div class="col-sm text-right align-content-end">
                                        <a type="button" class="btn btn-primary" href="{{route('phones.create')}}">Добавить новый</a>
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
                                        <th>Номер</th>
                                        <th>Описание</th>
                                        <th>Дата создания</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($phones as $phone)
                                        <tr>

                                            <td>
                                                {{$phone->phone}}
                                            </td>

                                            <td>
                                                {{$phone->description}}
                                            </td>

                                            <td>
                                                {{$phone->created_at}}
                                            </td>
                                            <td>
                                                    <a class="btn btn-icon btn-default" href="{{route('phones.edit', ['id' => $phone->id])}}"> <i class="fa fa-pencil-square-o"></i> </a>

                                                    <form method="post" action="{{route('phones.destroy', $phone->id)}}" style="display: inline;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Вы уверены что хотите удалить телефон?')"> <i class="fa fa-remove"></i> </button>
                                                    </form>

                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $phones->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection