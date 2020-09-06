<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Платёжные терминалы - страница авторизации</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Панель администрирования платёжных терминалов" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('layouts.headscripts')

</head>


<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="wrapper-page">

                    <div class="m-t-40 card-box">
                        <div class="text-center">
                            <h2 class="text-uppercase m-t-0 m-b-30">
                                <a href="/" class="text-success">
                                    <span><img src="{{asset('assets/images/logo.png')}}" alt="" height="60"></span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">
                            <form class="form-horizontal" method="POST" role="form" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group m-b-20{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" required placeholder="john@deo.com" value="{{ old('email') }}" autofocus name="email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-b-20{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-12">
                                        <a href="{{ route('password.request') }}" class="text-muted pull-right font-14">Забыли пароль?</a>
                                        <label for="password">Пароль</label>
                                        <input class="form-control" type="password" name="password" required id="password" placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-b-30">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox5" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="checkbox5">
                                                Запомнить меня
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
                                    </div>
                                </div>

                            </form>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end card-box-->


                    <div class="row m-t-50">
                        <div class="col-sm-12 text-center">
{{--                            <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark m-l-5">Sign Up</a></p>--}}
                        </div>
                    </div>

                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>

@include('layouts.bottomscripts')

</body>
</html>