@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-primary pull-right"  href="{{ route('tarif.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>
                <h5 class="card-title">Tarifs</h5>
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
                    <th>Nom</th>
                    <th>Tarif </th>
                    <th>Photo </th>
                    <th>Action</th>

                    @foreach ($tarifs as $tarif)
                        <tr>
                            <td>   {{$tarif->id}}</td>
                            <td>   {{$tarif->nom}}</td>
                            <td>   {{$tarif->tarif}}</td>
                            <td style="text-align: center">  <img src="{{URL::to('assets/tarifs/')}}/{{$tarif->id}}.png"  > </td>
                            <td>
                                <form action="{{ route('tarif.destroy',$tarif->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('tarif.edit',$tarif->id) }}">Edit</a>
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
