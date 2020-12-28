@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-title">Balles</p>
                                <p class="card-category"></p>
                                <p class="card-title">
                                <b class="text-primary">{{ $count = \DB::table('balles')->count()  }}</b>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats text-center">
                        <a type="button" href="{{ url('/equipment/balle') }}" class="btn btn-primary">Gérer</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-title">Batons</p>
                                <p class="card-category">Nombre de Bâtons</p>
                                <p class="card-title">
                                    <b class="text-primary">{{ $count = \DB::table('batons')->count()  }}</b>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats text-center">
                        <a type="button" href="{{ url('/equipment/baton') }}" class="btn btn-primary">Gérer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-title">Tees</p>
                                <p class="card-category"></p>
                                <p class="card-title">
                                    <b class="text-primary"> {{ $count = \DB::table('tees')->count()  }}</b>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats text-center">
                        <a type="button" href="{{ url('/equipment/tee') }}" class="btn btn-primary">Gérer</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
