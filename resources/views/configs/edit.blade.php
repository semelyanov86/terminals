@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="m-b-20 header-title">Добавление или редактирование конфигурации терминала</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal" method="post" role="form" action="{{route('configs.store')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{--                                @if($user->id > 0)--}}
                                    <input type="hidden" class="form-control" name="id" value="{{$config->id}}">
                                    {{--                                @endif--}}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="phone">Название конфигурации</label>
                                        <div class="col-md-10">
                                            <input type="text" id="name" class="form-control" placeholder="Введите название" name="name" value="{{old('name', $config->name)}}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="phone">Номер телефона</label>
                                        <div class="col-md-10">
                                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="712345678910" value="{{old('phone', $config->phone)}}">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('server') ? ' has-error' : '' }}">
                                        <label class="col-md-2 col-form-label" for="serverName">Адрес сервера</label>
                                        <div class="col-md-10">
                                            <input type="text" id="serverName" name="serverName" class="form-control" placeholder="http://" value="{{old('server', $config->server)}}">
                                            @if ($errors->has('server'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('server') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary">
                                            <input id="ping_block" name="ping_block" type="checkbox" @if($config->ping_block > 0) checked @endif>
                                            <label for="ping_block">
                                                Блокировать при потере пинга
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary">
                                            <input id="printer_block" name="printer_block" type="checkbox" @if($config->printer_block > 0) checked @endif>
                                            <label for="printer_block">
                                                Блокировать при неполадке принтера
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('published') ? ' has-error' : '' }}">
                                        <div class="checkbox checkbox-primary">
                                            <input id="published" name="published" type="checkbox" @if($config->published > 0) checked @endif>
                                            <label for="published">
                                                Конфигурация активна
                                            </label>
                                            @if ($errors->has('published'))
                                                <br><span class="help-block">
                                        <strong>{{ $errors->first('published') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--<div class="form-group m-b-0">
                                        <label class="control-label" for="images">Изображения слайдеров</label>
                                        <input type="file" class="form-control" id="images" name="images[]" multiple />
                                    </div>--}}
                                    <div class="form-group">
                                        <label class="control-label" for="images">Изображения слайдера</label>
                                        <input type="file" class="filestyle" data-input="false" name="images[]" id="images" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" multiple><div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="images" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Выберите файл</span> <span class="badge">1</span></label></span></div>
                                        @if ($errors->has('images'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    {{--<div class="form-group">
                                        <label class="control-label" for="images">Изображения слайдеров</label>
                                        <input type="file" class="filestyle" data-input="false" id="images" name="images[]" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" multiple><div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="images" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Выберите файлы</span></label></span></div>
                                    </div>--}}


                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Отправить
                                        </button>
                                        <a href="{{route('configs.index')}}" class="btn btn-default waves-effect m-l-5">
                                            Отменить
                                        </a>
                                    </div>

                                </form>
                                {{--@foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
