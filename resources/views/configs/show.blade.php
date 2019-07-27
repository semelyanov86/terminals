@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Информация о конфигурации</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Название</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Сервер</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->server}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Наименование организации</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->company}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Сайт</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->website}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Телефон</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->phone}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Блокирование при отсутствии пинга</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->ping_block_display}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Блокирование при неработоспособности принтера</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->printer_block_display}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Конфигурация активна?</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->published_display}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Дата создания</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->created_at}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Дата обновления</p>
                    </div>
                    <div class="col-sm">
                        <p>{{$config->updated_at}}</p>
                    </div>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner">
                        @foreach($config->images as $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img src="{{asset('/storage/images')}}/{{$image->filename}}" class="d-block w-100" alt="">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="form-group text-right m-b-0 mt-3">
                    @can('edit configs')
                    <a class="btn btn-primary waves-effect waves-light" href="{{route('configs.edit', ['id' => $config->id])}}">
                        Редактировать
                    </a>
                    @endcan
                    <a class="btn btn-default waves-effect m-l-5" href="{{route('configs.index')}}">
                        Назад
                    </a>
                </div>

            </div> <!-- container -->


        </div> <!-- content -->

    </div>
@endsection