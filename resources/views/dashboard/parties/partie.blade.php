@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-success pull-right"  href="{{ route('partie.create') }}">  <i class="nc-icon nc-simple-add"> Ajouter une partie </i></a>
                <a class="btn btn-dark pull-left"  href="{{ route('affectation.index') }}">  <i class="nc-icon nc-circle-10"> <b> Gérer les affectations</b> </i></a>
                <br>
                <br>
                <br>

                <h5 class="card-title">Parties</h5>
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
                    <th>Date de la partie</th>
                    <th>Nombre de joueurs</th>
                    <th>Parcours</th>
                    <th>Nombre de Trous</th>
                    <th>Status</th>
                    <th>Action</th>

                    @foreach ($parties as $partie)
                        <tr>
                            <td>   {{$partie->id}}</td>
                            <td>   {{$partie->date}}</td>
                            <td>   {{$partie->nombre_joueurs}}</td>
                            <td>   {{$partie->parcour->nom}}</td>
                            <td>   {{$partie->nombre_trous}}</td>
                            <td>   {{$partie->confirmed}}</td>
                            <td>
                                <form action="{{ route('partie.destroy',$partie->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('partie.edit',$partie->id) }}">Edit</a>
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
