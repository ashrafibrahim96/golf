@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-primary pull-right"  href="{{ route('tee.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>
                <h5 class="card-title">Tees</h5>
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
                    <th>Marque </th>
                    <th>Photo </th>
                    <th>Hauteur </th>
                    <th>Action</th>

                    @foreach ($tees as $tee)
                        <tr>
                            <td>   {{$tee->marque}}</td>
                            <td>   {{$tee->photo}}</td>
                            <td>   {{$tee->hauteur}}</td>
                            <td>
                                <form action="{{ route('tee.destroy',$tee->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('tee.edit',$tee->id) }}">Edit</a>
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
