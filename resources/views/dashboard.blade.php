@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <span class="float-right">
                        <a href="/listing/create" class="btn btn-success btn-sm">Add Listing</a>
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Listings</h3>
                    @if(count($listings) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($listings as $listing)
                                <tr>
                                <td>
                                    <a href="/listing/{{$listing->id}}">{{$listing->name}}</a>
                                </td>
                                    <td>
                                        <a class="btn btn-secondary float-right"
                                            href="/listing/{{$listing->id}}/edit">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                      {{-- Listing deleting form --}}
                                    {!!Form::open(['action' => ['ListingController@destroy',$listing->id],'method'=>'POST','class'=>'float-right', 'onsubmit' =>'return confirm("Are you sure?")'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
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
