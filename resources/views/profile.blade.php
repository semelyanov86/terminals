@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="p-0 text-center">
                            <div class="member-card">
                                <div class="thumb-xl member-thumb m-b-10 center-page">
                                    <img src="{{asset('/storage/avatars')}}/{{$user->image}}" class="rounded-circle img-thumbnail" alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h5 class="m-b-5 mt-3">{{$user->name}}</h5>
                                    <p class="text-muted">{{$user->first_role}}</p>
                                </div>

                                <p class="text-muted m-t-10">
                                    Адрес электронной почты пользователя: {{$user->email}}
                                </p>

                                @can('edit users')
                                <a type="button" class="btn btn-primary m-t-10" href="{{route('users.edit', ['id' => $user->id])}}">Изменить</a>
                                @endcan
                                @can('delete users')
                                <form method="post" action="{{route('users.destroy', $user->id)}}" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"  class="btn btn-danger mt-2" onclick="return confirm('Вы уверены что хотите удалить пользователя?')"> Удалить </button>
                                </form>
                                    @endcan

                            </div>

                        </div> <!-- end card-box -->

                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
    </div>
@endsection