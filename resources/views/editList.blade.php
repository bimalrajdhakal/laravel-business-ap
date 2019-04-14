
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Listing
              <span class="float-right"><a class="btn btn-warning btn-sm" href="/dashboard">Go Back</a></span>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {!! Form::open(['action' => ['ListingController@update',$listing->id],'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',$listing->name,['class'=>'form-control','placeholder'=>'Name of the company/Party'])}}
                </div>
                <div class="form-group">
                      {{Form::label('address','Address')}}
                      {{Form::text('address',$listing->address,['class'=>'form-control','placeholder'=>'Address of the company/Party'])}}
                </div>
              
                <div class="form-group">
                    {{Form::label('website','Website')}}
                    {{Form::text('website',$listing->website,['class'=>'form-control','placeholder'=>'Website'])}}
                </div>

                <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::text('email',$listing->email,['class'=>'form-control','placeholder'=>'Email'])}}
                </div>

                <div class="form-group">
                    {{Form::label('phone','Phone No.')}}
                    {{Form::text('phone',$listing->phone,['class'=>'form-control','placeholder'=>'Phone No.'])}}
                </div>

                <div class="form-group">
                    {{Form::label('bio','Bio')}}
                    {{Form::textarea('bio',$listing->bio,['class'=>'form-control','placeholder'=>'Bio'])}}
                </div>
                  {{Form::hidden('_method','PUT')}}
                  {{Form::submit('Update',['class'=>'btn btn-primary'])}} 
              
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>
@endsection