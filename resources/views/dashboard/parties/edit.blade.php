
@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Edit Partie</h5>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('partie.update',$partie->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Date</label>
                                <input class='form-control' value='{{ $partie->date }}' readonly />
                                <input type="datetime-local" class="form-control" value="{{ $partie->date }}" name="date">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Tarif</label>
                                <input type="number" class="form-control" value="{{ $partie->nombre_joueurs }}" name="nombre_joueurs">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Parcour id</label>
                                <input type="number" class="form-control" value="{{ $partie->parcour_id }}" name="parcour_id">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> NBR trous</label>
                                <input type="number" class="form-control" value="{{ $partie->nombre_trous }}" name="nombre_trous">
                            </div>
                        </div>
                        <!--<div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Confrmed</label>
                                <input type="text" class="form-control" value="{{ $partie->confirmed }}" name="confirmed">
                            </div>
                        </div>-->
                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Update Partie</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

