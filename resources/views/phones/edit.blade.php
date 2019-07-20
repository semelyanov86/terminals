@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="m-b-20 header-title">Добавление или редактирование заблокированного номера</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal" method="post" role="form" action="{{route('phones.store')}}">
                                    {{ csrf_field() }}
                                    {{--                                @if($user->id > 0)--}}
                                    <input type="hidden" class="form-control" name="id" value="{{$phone->id}}">
                                    {{--                                @endif--}}
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="phone">Номер телефона</label>
                                        <div class="col-md-10">
                                            <input type="tel" id="phone" class="form-control" placeholder="71234567890" name="phone" value="{{old('phone', $phone->phone)}}">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="description">Описание</label>
                                        <div class="col-md-10">
                                            <input type="text" id="description" name="description" class="form-control" placeholder="Описание" value="{{old('description', $phone->description)}}">
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{url()->previous()}}" class="btn btn-danger">Отменить</a>
                                    <button type="submit" class="btn btn-primary">Отправить</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
