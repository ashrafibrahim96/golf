@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Messages</h5>
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
                    <th>Nom & Prénom</th>
                    <th>E-mail</th>
                    <th>Message</th>
                    <th>Date du message</th>
                    <th>Action</th>

                @foreach ($messages as $message)
                        <tr>
                            <td>   {{$message->nom}}</td>
                            <td>   {{$message->email}}</td>
                            <td>   {{$message->texte}}</td>
                            <td>   {{$message->created_at}}</td>
                            <td>
                                <form action="{{ route('message.destroy',$message->id) }}" method="POST">
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
