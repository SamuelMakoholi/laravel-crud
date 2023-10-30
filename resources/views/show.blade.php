@extends('layouts.master')

@section('content')

<div class="main-content mt-5">
    <div class="card">
    <div class="card-header">
       <div class="row">
        <div class="col-md-6 fw-bold">
            Show Post
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            {{-- <a class="btn btn-success mx-1" href="">Create</a> --}}
            <a class="btn btn-primary mx-1" href="{{route('posts.index')}}">Back</a>
        </div>

       </div>
    </div>
        <div class="card-body">
            <table class="table table-striped table-bordered border-dark">
                <tbody>
                    <tr>
                        <td><b>ID</b></td>
                        <td>{{ $post->id}}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Image</td>
                        <td>
                            <img src="{{asset('storage/'.$post->image)}}" width="80" alt=""/>
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Title</td>
                        <td>{{ $post->title}}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Description</td>
                        <td>{{ $post->description}}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Category</td>
                        <td>{{$post->category->name}} </td>
                    </tr>

                    <tr>
                        <td class="fw-bold">Published Date</td>
                        <td>{{date('d-m-Y', strtoTime($post->updated_at))}}</td>
                    </tr>


                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection



