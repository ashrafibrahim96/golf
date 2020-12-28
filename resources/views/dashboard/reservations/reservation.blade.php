@extends('layouts.master')
@section('content')
 
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Reservations</h5>
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
                    <th>Nom & Prénom</th>
                    <th>Date de la partie</th>
                    <th>Nombre de Trous</th>
                     <th>Les location</th>
                    <th>Action</th>
                    <tr>

                </table>
            </div>
        </div>
    </div>
@endsection
