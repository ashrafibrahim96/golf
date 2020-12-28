
@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Mettre à jour Baton</h5>
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
                <form action="{{ route('baton.update',$baton->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Marque</label>
                                <input type="text" class="form-control" value="{{ $baton->marque }}" name="marque">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Photo </label>
                                <input type="text" name="photo"  class="form-control" value="{{$baton->photo }}">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Nom</label>
                                <input type="text" name="nom"  class="form-control" value="{{$baton->nom }}">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Favori </label>
                                <input type="text" name="favori"  class="form-control" value="{{$baton->favori }}">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Distance </label>
                                <input type="text" name="distance"  class="form-control" value="{{$baton->distance }}">
                            </div>
                        </div>


                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Mettre à jour Baton</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
