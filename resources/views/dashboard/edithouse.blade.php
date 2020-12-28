
@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Modifier les détails du golf club</h5>
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
                <form action="{{ route('clubhouse.update',$clubhouse->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" value="{{ $clubhouse->nom }}" name="nom">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label> Logo</label>
                                <input type="text" name="GPS"  class="form-control" value="{{$clubhouse->GPS }}">
                            </div>
                        </div>

                    </div>
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Modifier les détails du golf club</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
