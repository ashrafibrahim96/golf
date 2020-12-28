
@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Modifier les détails du parcours</h5>
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
                <form action="{{ route('parcour.update',$parcour->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" value="{{ $parcour->nom }}" name="nom">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Nombre de Trous </label>
                                <input type="text" name="nombre_de_trous"  class="form-control" value="{{$parcour->nombre_de_trous }}">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Club House id </label>
                                <input type="text" name="clubHouse_id"  class="form-control" value="{{$parcour->clubHouse_id }}">
                            </div>
                        </div>

                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Modifier les détails du parcours</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
