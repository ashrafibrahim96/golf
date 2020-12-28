@extends('layouts.master')
@section('content')

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <a class="btn btn-primary pull-right"  href="{{ route('trou.create') }}">  <i class="nc-icon nc-simple-add"> ADD </i></a>
                <h5 class="card-title">Trous</h5>
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

                    <th>Trou</th>
                    <th>Par</th>
                    <th>StrokeIndex</th>
                    <th>Distane blanc</th>
                    <th>Distane bleu </th>
                    <th>Distane rouge </th>
                    <th>Distane jaune </th>
                    <th style="text-align: center" >Photo</th>
                    <th>Parcours</th>
                    <th>Action</th>

                    @foreach ($trous as $trou)
                        <tr>

                            <td>   {{$trou->numero}}</td>
                            <td>   {{$trou->par}}</td>
                            <td>   {{$trou->strokeIndex}}</td>
                            <td>   {{$trou->distance_trou_blanc}}</td>
                            <td>   {{$trou->distance_trou_bleu}}</td>
                            <td>   {{$trou->distance_trou_rouge}}</td>
                            <td>   {{$trou->distance_trou_jaune}}</td>

                            <td style="text-align: center">  <img src="{{URL::to('assets/img-trous/')}}/{{$trou->image2D}}" style="height:200px" > </td>
                            <td>   {{$trou->parcour->nom}}</td>
                            <td>
                                <form action="{{ route('trou.destroy',$trou->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('trou.edit',$trou->id) }}">Edit</a>
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
