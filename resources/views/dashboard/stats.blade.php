@extends('layouts.master')
@section('content')
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
            <th>name</th>
            <th>email</th>
            @foreach ($statistiques as $statistique)
                <tr>
                    <td>   {{$statistique->gir}}</td>
                    <td>   {{$statistique->fairway}}</td>

                    <td>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
