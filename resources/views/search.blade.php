@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Результаты поиска</h4>
                    </div>
                </div>
                @foreach($users as $user)
                    <h5><a href="{{route('users.view', ['id' => $user->id])}}">{{$user->name}}</a></h5>
                    <p class="text-muted">{{$users->email}}</p>
                @endforeach
                @foreach($terminals as $terminal)
                    <h5><a href="{{route('terminals.show', ['id' => $terminal->id])}}">{{$terminal->display_name}}</a></h5>
                    <p class="text-muted">{{$terminal->description}}</p>
                @endforeach
                @foreach($payers as $payer)
                    <h5><a href="{{route('payers.show', ['id' => $payer->id])}}">{{$payer->name}}</a></h5>
                    <p class="text-muted">{{$payer->onees}}</p>
                @endforeach

            </div> <!-- container -->


        </div> <!-- content -->

    </div>
@endsection