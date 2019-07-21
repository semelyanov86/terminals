@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="m-b-20 header-title">Добавление или редактирование филиала</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal" method="post" role="form" action="{{route('filials.store')}}">
                                    {{ csrf_field() }}
                                    {{--                                @if($user->id > 0)--}}
                                    <input type="hidden" class="form-control" name="id" value="{{$filial->id}}">
                                    {{--                                @endif--}}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="phone">Название филиала</label>
                                        <div class="col-md-10">
                                            <input type="text" id="name" class="form-control" placeholder="Введите название" name="name" value="{{old('name', $filial->name)}}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="display_name">Отображаемое имя</label>
                                        <div class="col-md-10">
                                            <input type="text" id="display_name" class="form-control" placeholder="Введите название" name="display_name" value="{{old('display_name', $filial->display_name)}}">
                                            @if ($errors->has('display_name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="description">Отображаемое имя</label>
                                        <div class="col-md-10">
                                            <textarea id="description" class="form-control" name="description" rows="5">{{old('description', $filial->description)}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Отправить
                                        </button>
                                        <a href="{{route('filials.index')}}" class="btn btn-default waves-effect m-l-5">
                                            Отменить
                                        </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
