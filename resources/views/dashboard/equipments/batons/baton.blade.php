@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-primary pull-right"  href="{{ route('baton.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>
                <h5 class="card-title">Batons</h5>
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
                    <th>Marque </th>

                    <th>Nom</th>
                    <th>Distance</th>
                    <th>Photo</th>
                    <th>Action</th>

                    @foreach ($batons as $baton)
                        <tr>
                            <td>   {{$baton->id}}</td>
                            <td>   {{$baton->marque}}</td>

                            <td>   {{$baton->nom}}</td>


                            <td>   {{$baton->distance}}</td>

                            

                            <td> <img src="{{URL::to('assets/batons/')}}/{{$baton->photo}}" style="height:200px"> </td>

                            <td>
                                <form action="{{ route('baton.destroy',$baton->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('baton.edit',$baton->id) }}">Edit</a>
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
