@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Ajouter Partie</h5>
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
                <form action="{{ route('partie.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Date de la partie</label>
                                <input type="datetime-local" class="form-control" name="date"  placeholder="Date">
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>NBR Joueurs</label>
                                <input type="number" name="nombre_joueurs" class="form-control" placeholder="Nombre de Joueurs" min="1"  max="4">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Parcours</label>
                                <input type="number" name="parcour_id" class="form-control" placeholder="Parcours id">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Nombre de Trous</label>
                                <input type="number" name="nombre_trous" class="form-control" placeholder="Nombre de trous" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Ajouter Partie</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
