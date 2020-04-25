@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Listing<a href="/dashboard" class="btn btn-danger btn-xs float-right" >Go back</a></div>

                

                    <h3>Your listing</h3>
                      {!! Form::open(['action' => 'ListingsController@store','method'=>'POST']) !!}
                            <!--
                            //tb3n 2bl ay 7ga lazm a3ml update composer 3lshan yanzl laravel collective (html)=>Form
                            //bdef kam line fil config=>app.php ( providers , alies)
                            //kol 7aga mn dol bro7 a3del fil FormServiceProvider w b3d kda bcreate file fil view=>component=>Form=>filename bnfs alname 3lshan bs 2adr 2ast5dma hena
                            -->
                            {{ Form::bsText('name','',['placeholder'=>'Company Name']) }}
                            {{ Form::bsText('address','',['placeholder'=>'Company Address']) }}
                            {{ Form::bsText('website','',['placeholder'=>'Company Website']) }}
                            {{ Form::bsText('email','',['placeholder'=>'E-mail']) }}
                            {{ Form::bsText('phone','',['placeholder'=>'Company Phone']) }}
                            {{ Form::bsTextArea('bio','',['placeholder'=>'About this business']) }}
                            {{ Form::bsSubmit('submit',['class'=>'btn btn-primary']) }}
                      {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
