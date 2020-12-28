@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Ajouter une actualité</h5>
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
                <form action="{{ route('actualites.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" class="form-control" name="titre"  placeholder="Titre">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Contenu</label>
                                <textarea type="text" name="texte" class="form-control" placeholder="Contenu"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="text" name="photo" class="form-control" placeholder="Photo" >
                            </div>
                        </div>
                    </div>
                <!--  <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label> Phone</label>
                                <input type="text" name="telephone" class="form-control" placeholder="Phone" >
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Sexe</label>
                                <input type="text" name="sexe" class="form-control" placeholder="homme/femme" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Birth date</label>
                                <input type="date" name="dateDeNaissance" class="form-control" placeholder="Birth date" >
                            </div>
                        </div>
                    </div> -->

                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Ajouter actualité</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
