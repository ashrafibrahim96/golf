@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-primary pull-right"  href="{{ route('actualites.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>
                <h5 class="card-title">Actualités</h5>
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
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="5">
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th style="text-align: center">Photo</th>
                    <th>Action</th>

                    @foreach ($actualites as $actualite)
                        <tr>
                            <td>   {{$actualite->id}}</td>
                            <td>   {{$actualite->titre}}</td>
                            <td>   {{$actualite->texte}}</td>
                            <td style="text-align: center"> <img src="{{URL::to('uploads/actualite/')}}/{{$actualite->photo}}" style="width:150px"> </td>
                            <td>
                                <form action="{{ route('actualites.destroy',$actualite->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('actualites.edit',$actualite->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
