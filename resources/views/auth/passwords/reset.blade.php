<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Платёжные терминалы - восстановление пароля</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
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
                                <a href="index.html" class="text-success">
                                    <span><img src="{{asset('assets/images/logo.png')}}" alt="" height="30"></span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">
                            <div class="text-center m-b-20">
                                <p class="text-muted m-b-0 line-h-24">Введите свой email адрес и мы отправим вам инструкцию по восстановлению пароля.  </p>
                            </div>

                            <form class="form-horizontal" method="post" action="{{ route('password.update') }}">
                                @csrf

                                <div class="form-group m-b-20">
                                    <div class="col-12">
                                        <label for="email">Email address</label>
                                        <input class="form-control" type="email" id="email" name="email" required="" placeholder="john@deo.com">
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Восстановить пароль</button>
                                    </div>
                                </div>

                            </form>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end card-box-->


                    <div class="row m-t-50">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Вернуться на <a href="/" class="text-dark m-l-5">страницу авторизации</a></p>
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

