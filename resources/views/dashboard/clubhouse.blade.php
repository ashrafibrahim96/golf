@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-primary pull-right"  href="{{ route('clubhouse.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>
                <h5 class="card-title">Golf Clubs</h5>
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
                    <th>Nom du golf</th>
                    <th style="text-align: center">Logo</th>
                    <th>Action</th>

                    @foreach ($clubhouses as $clubhouse)
                        <tr>
                            <td>   {{$clubhouse->id}}</td>
                            <td>   {{$clubhouse->nom}}</td>
                            <td style="text-align: center"> <img src="{{URL::to('assets/clubs/')}}/{{$clubhouse->GPS}}" style="width:150px"> </td>
                            <td>
                                <form action="{{ route('clubhouse.destroy',$clubhouse->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('clubhouse.edit',$clubhouse->id) }}">Edit</a>
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
