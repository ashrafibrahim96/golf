@extends('layouts.master')
@section('content')

    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="/assets/img/cover.jpg" alt="...">
            </div>
            <div class="card-body">
                <div class="author">
                    <a href="#">
                        <img class="avatar border-gray" src="/assets/img/mike.jpg" alt="...">
                        <h5 class="title">{{ $user->name }}</h5>
                    </a>
                    <p class="description">
                        @chetfaker
                    </p>
                </div>
                <p class="description text-center">
                    "I like the way you work it <br>
                    No diggity <br>
                    I wanna bag it up"
                </p>
            </div>
            <div class="card-footer">
                <hr>
                <div class="button-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-6 ml-auto">
                            <h5>12<br><small>Files</small></h5>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                            <h5>2GB<br><small>Used</small></h5>
                        </div>
                        <div class="col-lg-3 mr-auto">
                            <h5>24,6$<br><small>Spent</small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Show user statistiques</h5>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                    <th>gir</th>
                    <th>fairway</th>
                    @foreach ($statistiques as $statistique)
                        <tr>
                            <td>   {{$statistique->gir}}</td>
                            <td>   {{$statistique->fairway}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Last matches</h5>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                    <th>partie id</th>
                    <th>handicap</th>
                    @foreach ($matches as $match)
                        <tr>
                            <td>   {{$match->partie_id}}</td>
                            <td>   {{$match->handicap}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
