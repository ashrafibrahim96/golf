
@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Modifier Actualité</h5>
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
                <form action="{{ route('actualites.update',$actualites->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" class="form-control" value="{{ $actualites->titre }}" name="titre">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Contenu</label>
                                <textarea type="text" name="texte"  class="form-control">{{$actualites->texte }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="text" name="photo" class="form-control" value="{{ $actualites->photo }}" >
                            </div>
                        </div>
                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Modifier Actualité</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
