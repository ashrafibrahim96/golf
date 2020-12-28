
@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Modifier trou</h5>
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
                <form action="{{ route('trou.update',$trous->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Trou</label>
                                <input type="number" class="form-control" value="{{$trous->numero}}" name="Numéro">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Par</label>
                                <input type="number" name="par" class="form-control" value="{{$trous->par}}">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Stroke Index</label>
                                <input type="number" name="strokeIndex" value="{{$trous->strokeIndex}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Blanc</label>
                                <input type="number" name="distance_trou_blanc" class="form-control" value="{{$trous->distance_trou_blanc}}" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Bleu</label>
                                <input type="number" name="distance_trou_bleu" class="form-control" value="{{$trous->distance_trou_bleu}}">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Rouge</label>
                                <input type="number" name="distance_trou_rouge" class="form-control" value="{{$trous->distance_trou_rouge}}" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Distance Trou Jaune</label>
                                <input type="number" name="distance_trou_jaune" class="form-control" value="{{$trous->distance_trou_jaune}}" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>GPS</label>
                                <input type="text" name="GPS" class="form-control" value="{{$trous->GPS}}">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="text" name="image2D" class="form-control" value="{{$trous->image2D}}" >
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Parcour ID</label>
                                <input type="text" name="parcour_id" class="form-control" value="{{$trous->parcour_id}}" >
                            </div>
                        </div>
                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Modifier le Trou</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
