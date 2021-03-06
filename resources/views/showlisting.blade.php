@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$listing->name}} <a href="/" class="btn btn-danger btn-xs float-right" >Go back</a> </div>

                    <ul class="list-group">

                        <li class="list-group-item">Address: {{$listing->address}}</li>
                        <li class="list-group-item">Website:  <a href="{{$listing->website}}" target="_blank">{{$listing->website}}</a> </li>
                        <li class="list-group-item">E-mail: {{$listing->email}}</li>
                        <li class="list-group-item">Phone: {{$listing->phone}}</li>

                    </ul>
                    <hr>
                    <div class="card">
                        {{$listing->bio}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
