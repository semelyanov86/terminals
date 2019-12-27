@extends('master')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="m-b-20 header-title">Создание нового платёжного терминала</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" method="post" role="form" action="{{route('terminals.store')}}">
                                {{ csrf_field() }}
{{--                                @if($user->id > 0)--}}
                                    <input type="hidden" class="form-control" name="id" value="{{$terminal->id}}">
                                    <input type="hidden" class="form-control" name="user_id" value="{{auth()->id()}}">
{{--                                @endif--}}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label" for="name">Имя</label>
                                    <div class="col-md-10">
                                        <input id="name" type="text" class="form-control" name="name" value="{{old('name', $terminal->name)}}">
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
                                        <input type="text" id="display_name" name="display_name" class="form-control" value="{{old('display_name', $terminal->display_name)}}">
                                        @if ($errors->has('display_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label">Пароль</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" name="password" value="">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label" id="password-confirm">Подтвердите пароль</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('filial_id') ? ' has-error' : '' }}">
                                    <label class="col-sm-2 col-form-label" for="filial_id">Выберите филиал</label>
                                    <div class="col-sm-10">
                                        <select id="filial_id" name="filial_id" class="form-control">
                                            @foreach($filials as $filial)
                                            <option value="{{$filial->id}}" @if($terminal->filial_id == $filial->id) selected @endif>{{$filial->display_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('filial_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('filial_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label class="col-sm-2 col-form-label" for="category_id">Выберите категорию</label>
                                    <div class="col-sm-10">
                                        <select id="category_id" name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($terminal->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('inkasso_pass') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label" for="inkasso_pass">Пароль инкассатора</label>
                                    <div class="col-md-10">
                                        <input type="text" id="inkasso_pass" name="inkasso_pass" class="form-control" value="{{old('inkasso_pass', $terminal->inkasso_pass)}}">
                                        @if ($errors->has('inkasso_pass'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('inkasso_pass') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('tmp_pass') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label" for="tmp_pass">Временный пароль</label>
                                    <div class="col-md-10">
                                        <input type="text" id="tmp_pass" name="tmp_pass" class="form-control" value="{{old('tmp_pass', $terminal->tmp_pass)}}">
                                        @if ($errors->has('tmp_pass'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('tmp_pass') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('active') ? ' has-error' : '' }}">
                                    <div class="checkbox checkbox-primary">
                                        <input id="active" name="active" type="checkbox" @if($terminal->active > 0) checked @endif>
                                        <label for="active">
                                            Терминал активен
                                        </label>
                                        @if ($errors->has('active'))
                                            <br><span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('log_path') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label" for="name">Папка с логами</label>
                                    <div class="col-md-10">
                                        <input id="log_path" type="text" class="form-control" name="log_path" value="{{old('log_path', $terminal->log_path)}}">
                                        @if ($errors->has('log_path'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('log_path') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('notifications_sub') ? ' has-error' : '' }}">
                                    <div class="checkbox checkbox-primary">
                                        <input id="notifications_sub" name="notifications_sub" type="checkbox" @if($terminal->notifications_sub > 0) checked @endif>
                                        <label for="notifications_sub">
                                            Уведомлять при ошибках
                                        </label>
                                        @if ($errors->has('notifications_sub'))
                                            <br><span class="help-block">
                                        <strong>{{ $errors->first('notifications_sub') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label" for="description">Описание</label>
                                    <div class="col-md-10">
                                        <textarea id="description" class="form-control" name="description" rows="5">{{old('description', $terminal->description)}}</textarea>
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
                            @foreach($errors->all() as $message)
                                {{$message}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.copyright')
    </div>
</div>
@endsection
