
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{$listing->name}}
              <span class="float-right"><a class="btn btn-warning btn-sm" href="
                {{Auth::user()?'/dashboard':'/listing'}}">Go Back</a></span>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <ul class="list-group">
                  <li class="list-group-item">Address:{{$listing->address}}</li>
                  <li class="list-group-item">Website:{{$listing->website}}</li>
                  <li class="list-group-item">Email:{{$listing->email}}</li>
                  <li class="list-group-item">Phone No:{{$listing->phone}}</li>
                </ul>
                <hr>
                <div class="card card-body bg-light">
                    {{$listing->bio}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection