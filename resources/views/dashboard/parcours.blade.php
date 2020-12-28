@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-primary pull-right"  href="{{ route('parcour.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>
                <h5 class="card-title">Parcours</h5>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="5">
                    <th>ID</th>
                    <th>Nom du parcours</th>
                    <th>Nombre de trous</th>
                    <th>ClubHouse</th>
                    <th>Action</th>

                    @foreach ($parcours as $parcour)
                        <tr>
                            <td>   {{$parcour->id}}</td>
                            <td>   {{$parcour->nom}}</td>
                            <td>   {{$parcour->nombre_de_trous}}</td>
                            <td>   {{$parcour->clubhouse->nom}}</td>
                            <td>
                                <form action="{{ route('parcour.destroy',$parcour->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('parcour.edit',$parcour->id) }}">Edit</a>
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
