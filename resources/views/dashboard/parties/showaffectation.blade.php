@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-dark pull-left"  href="{{ route('affectation.create') }}">  <i class="nc-icon nc-simple-add"> <b> Affecter joueurs</b> </i></a>
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
                    <th>User_id</th>
                    <th>Partie_id</th>
                    <th>Action</th>

                    @foreach ($affectations as $affectation)
                        <tr>
                            <td>   {{$affectation->user_id}}</td>
                            <td>   {{$affectation->partie_id}}</td>

                            <td>
                                <form action="{{ route('affectation.destroy',$affectation->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('affectation.edit',$affectation->id) }}">Edit</a>
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
