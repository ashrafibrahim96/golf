@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
    <div class="card-header">
        <a class="btn btn-primary pull-right"  href="{{ route('user.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>

        <h5 class="card-title">Gerer les Utilisateurs</h5>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>w
        </div>
    @endif
            <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="5">
        <th>ID</th>
        <th>Nom & Prénom</th>
        <th>E-mail</th>
        <!-- <th>Student</th> -->
        <th>Numéro</th>
        <th>Sexe</th>
        <th>Date de Naissance</th>
        <th width="280px">Action</th>
        @foreach ($users as $user)
            <tr>
                <td>   {{$user->id}}</td>
                <td>   {{$user->name}}</td>
                <td>  {{$user->email}}</td>
                <td>  {{$user->telephone}}</td>
                <td> {{$user->sexe}}</td>
                <td> {{$user->dateDeNaissance}}</td>
                <td>
                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('user.display',$user->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
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

@section('scripts')

@endsection
