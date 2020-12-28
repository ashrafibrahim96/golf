@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Affecter joueurs</h5>
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
                <form action="{{ route('affectation.store'),$id_partie->id}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>User ID Nom twali</label>
                                <select name="user_id" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">
                                            {{$user->name}}
                                        </option>
                                      <!--   <option value="{{$user}}"> {{$user->name}} </option>-->
                                    @endforeach

                                </select>
                                <!-- <input type="number" class="form-control" name="user_id"  placeholder="User ID">-->
                            </div>
                        </div>
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Partie ID</label>
                                <input type="number" class="form-control" name="partie_id" value="{{$id_partie->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round"> Add Affectation</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
