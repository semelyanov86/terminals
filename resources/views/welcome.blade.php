@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Welcome !</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box widget-inline">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-primary mdi mdi-access-point-network"></i> <b>8954</b></h3>
                                        <p class="text-muted">Lifetime total sales</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-custom mdi mdi-airplay"></i> <b>7841</b></h3>
                                        <p class="text-muted">Income amounts</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-info mdi mdi-black-mesa"></i> <b>6521</b></h3>
                                        <p class="text-muted">Total users</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center b-0">
                                        <h3 class="m-t-10"><i class="text-danger mdi mdi-cellphone-link"></i> <b>325</b></h3>
                                        <p class="text-muted">Total visits</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end row -->


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h6 class="m-t-0">Total Revenue</h6>
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li class="list-inline-item">
                                        <p class="font-normal"><i class="fa fa-circle m-r-10 text-primary"></i>Series A</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="font-normal"><i class="fa fa-circle m-r-10 text-muted"></i>Series B</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="dashboard-bar-stacked" class="morris-chart" style="height: 300px;"></div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h6 class="m-t-0">Sales Analytics</h6>
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li class="list-inline-item">
                                        <p class="font-weight-bold"><i class="fa fa-circle m-r-10 text-primary"></i>Mobiles</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="font-weight-bold"><i class="fa fa-circle m-r-10 text-info"></i>Tablets</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="dashboard-line-chart" class="morris-chart" style="height: 300px;"></div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container -->


            <div class="footer">
                <div class="pull-right hide-phone">
                    Project Completed <strong class="text-custom">57%</strong>.
                </div>
                <div>
                    <strong>Simple Admin</strong> - Copyright © 2017 - 2019
                </div>
            </div>

        </div> <!-- content -->

    </div>
@endsection