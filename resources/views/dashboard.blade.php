@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <a href="/listings/create" class="btn btn-primary btn-xs float-right" >Add New Listing</a></div>

              
                    <h3>Your listing</h3>
                    @if(count($listings) > 0 )
                        <table class="table table-stripad">
                          <tr>
                            <th>Company Name</th>
                            <th>Company Address</th>
                            <th>Website</th>
                            <th>E-mail Address</th>
                            <th>Phone Number</th>
                            <th>Bio</th>

                          </tr>
                          @foreach($listings as $listing)
                          <tr>
                              <td>{{$listing->name}}</td>
                              <td>{{$listing->address}}</td>
                              <td>{{$listing->website}}</td>
                              <td>{{$listing->email}}</td>
                              <td>{{$listing->phone}}</td>
                              <td>{{$listing->bio}}</td>
                              <td> <a href="/listings/{{$listing->id}}/edit" class="float-right btn btn-primary ">Edit</a> </td>
                              <td>
                                    {!! Form::open(['action' => ['ListingsController@destroy', $listing->id],'method'=>'POST','class'=>'float-right', 'onsubmit'=>'return confirm("Are you sure?!")']) !!}

                                          {{ Form::hidden('_method','DELETE') }}
                                          {{ Form::bsSubmit('Delete',['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}

                              </td>
                          </tr>
                          @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
