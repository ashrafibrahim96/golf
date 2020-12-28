@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Ajouter un Tarif</h5>
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
                <form action="{{ route('tarif.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="nom"  placeholder="Nom">
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Tarif</label>
                                <input type="text" name="tarif" class="form-control" placeholder="Tarif" >
                            </div>
                        </div>
                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Ajouter Tarif</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
