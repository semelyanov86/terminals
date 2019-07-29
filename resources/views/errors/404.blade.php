<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Error 404</title>
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
                                <a href="/" class="text-success">
                                    <span><img src="/assets/images/logo.png" alt="" height="30"></span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">
                            <div class="text-center m-b-20">
                                <img src="/assets/images/cancel.svg" title="invite.svg" height="80" class="m-t-10">
                                <h3 class="expired-title mb-4 mt-2">Page Not Found</h3>
                                <p class="text-muted m-t-20 line-h-24"> It's looking like you may have taken a
                                    wrong turn. Don't worry... it
                                    happens to the best of us. You might want to check your internet connection. </p>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-12">
                                    <a href="/" class="btn btn-lg btn-primary btn-block">Back to Home</a>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end card-box-->

                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>

@include('layouts.bottomscripts')

</body>
</html>