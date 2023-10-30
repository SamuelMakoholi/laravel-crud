@extends('layouts.master')

@section('content')

<div class="main-content mt-5">
    <div class="card">
    <div class="card-header">
       <div class="row">
        <div class="col-md-6 f-bold">
            Create Post
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            {{-- <a class="btn btn-success mx-1" href="">Create</a> --}}
            <a class="btn btn-primary mx-1" href="{{route('posts.index')}}">Back</a>
        </div>

       </div>
    </div>
        <div class="card-body">
          {{-- <h5 class="f-bold">Create Form</h5> --}}

        </div>
    </div>
</div>
@endsection



