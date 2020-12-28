@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Ajouter Trou</h5>
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
                <form action="{{ route('trou.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Trou</label>
                                <input type="number" class="form-control" name="numero"  placeholder="Numero">
                            </div>
                        </div>

                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Par</label>
                                <input type="number" name="par" class="form-control" placeholder="Par" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Stroke Index</label>
                                <input type="number" name="strokeIndex" class="form-control" placeholder="Stroke Index" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Blanc</label>
                                <input type="number" name="distance_trou_blanc" class="form-control" placeholder="Distance Trou Blanc" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Bleu</label>
                                <input type="number" name="distance_trou_bleu" class="form-control" placeholder="Distance Trou Blanc" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Rouge</label>
                                <input type="number" name="distance_trou_rouge" class="form-control" placeholder="Distance Trou Blanc" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Jaune</label>
                                <input type="number" name="distance_trou_jaune" class="form-control" placeholder="Distance Trou Blanc" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>GPS</label>
                                <input type="text" name="GPS" class="form-control" placeholder="GPS" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="text" name="image2D" class="form-control" placeholder="image 2D" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Parcours ID</label>
                                <input type="text" name="parcour_id" class="form-control" placeholder="Parcours ID" >
                            </div>
                        </div>

                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Ajouter Trou</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
