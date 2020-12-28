@extends('layouts.master')
@section('content')

            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="5">
                    <th>ID</th>
                    <th>User</th>
                    <th>Date Match</th>
                    <th>Nbr Trous</th>
                     <th>Location</th>

                        <tr>
                            @foreach (json_decode($loc) as $reservation)

                            <td>   {{$reservation->reservation_id}}</td>
                             <td>   {{$reservation->name}}</td>
                            <td>   {{$reservation->date_matche}}</td>
                            @if ($reservation->match_id=$match)
                                    <td>{{$match}}</td>
                                @else
                                    <td>{{$match}}</td>
                                @endif

                                <td>{{$reservation->tarif}}</td>
                    </tr>
                    @endforeach
                    <p>{{$loc}}</p>
                </table>
            </div>
        </div>
    </div>
@endsection
