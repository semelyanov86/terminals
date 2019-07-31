@extends('master')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Отчёт по платежам</h4>
                    </div>
                </div>

                        <div class="row p-t-50">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <h4 class="font-14">Таблица платежей</h4>
                                    <p class="text-muted font-13 m-b-30">
                                        В данном отчёте показаны все произведённые платежи
                                    </p>
                                    {{--<div class="columns">
                                        <div class="column is-2">
                                            <vue-filter class="box raises-on-hover"
                                                        :options="activeOptions"
                                                        icons
                                                        title="Active"
                                                        v-model="filters.examples.is_active">
                                            </vue-filter>
                                        </div>
                                        <div class="column is-3">
                                            <vue-select-filter class="box raises-on-hover"
                                                               title="Seniority"
                                                               multiple
                                                               :options="seniorityOptions"
                                                               v-model="filters.examples.seniority">
                                            </vue-select-filter>
                                        </div>
                                        <div class="column is-4">
                                            <date-interval-filter class="box raises-on-hover"
                                                                  title="Hired Between"
                                                                  @update="
                                intervals.examples.hired_at.min = $event.min;
                                intervals.examples.hired_at.max = $event.max
                            ">
                                            </date-interval-filter>
                                        </div>
                                        <div class="column is-3">
                                            <interval-filter class="box raises-on-hover"
                                                             title="Salary"
                                                             type="number"
                                                             v-model="intervals.examples.salary">
                                            </interval-filter>
                                        </div>
                                    </div>
                                    <vue-table class="box is-paddingless raises-on-hover is-rounded"
                                               path="/examples/table/init"
                                               :filters="filters"
                                               :intervals="intervals"
                                               @clicked="clicked"
                                               @excel="$toastr.info('You just pressed Excel', 'Event')"
                                               @create="$toastr.success('You just pressed Create', 'Event')"
                                               @edit="$toastr.warning('You just pressed Edit', 'Event')"
                                               @destroy="$toastr.error('You just pressed Delete', 'Event')"
                                               id="incassation">
                                    <span slot="project"
                                          slot-scope="props"
                                          :class="[
                                            'tag is-table-tag',
                                            { 'is-success': props.row.project === 'Enso SPA' },
                                            { 'is-warning': props.row.project === 'Webshop' },
                                            { 'is-info': props.row.project === 'AdminLTE' }
                                        ]">
                                        @{{ props.row.project }}
                                    </span>
                                    </vue-table>--}}
                                    <form name="daterange-form" action="{{route('report.payments')}}" method="get">
                                    <div class="row form-group m-t-50">
                                            @csrf
                                            <div class="col-md-8">
                                                <div>
                                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="{{request('daterange')}}"/>
                                                </div>
                                                <label>Выберите диапазон дат</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div></div>
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" name="filter" id="filter">
                                                    Фильтровать
                                                </button>
                                                <a type="button" href="{{route('report.payments')}}" class="btn btn-default waves-effect m-l-5">
                                                    Сбросить
                                                </a>
                                            </div>

                                    </div>
                                    </form>

                                    {!! $dataTable->table([], true) !!}

                                    {{--<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Дата инкассации</th>
                                            <th>Сумма</th>
                                            <th>Количество купюр</th>
                                            <th>Терминал</th>
                                            <th>Пользователь</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table>--}}
                                </div>
                            </div>
                        </div>
            </div>
            @include('layouts.copyright')
        </div>
    </div>

@endsection