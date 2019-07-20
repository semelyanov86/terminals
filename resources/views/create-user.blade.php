@extends('master')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="m-b-20 header-title">Создание нового пользователя</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" method="post" role="form" action="{{route('users.store')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
{{--                                @if($user->id > 0)--}}
                                    <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
{{--                                @endif--}}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label">Имя</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" value="{{old('email', $user->email)}}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-2 col-form-label">Password</label>
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
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                                    <label class="col-sm-2 col-form-label">Выберите роль</label>
                                    <div class="col-sm-10">
                                        <select name="roles" class="form-control">
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('roles'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('roles') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-sm-2 col-form-label" for="avatarFile">Приложите аватар</label>
                                    <input type="file" class="form-control-file" name="image" id="avatarFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
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
