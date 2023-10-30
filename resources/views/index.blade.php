@extends('layouts.master')

@section('content')

<div class="main-content mt-5">
    <div class="card">
    <div class="card-header">
       <div class="row">
        <div class="col-md-6">
            All Posts
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <a class="btn btn-success mx-1" href="{{route('posts.create')}}">Create</a>
            <a class="btn btn-warning mx-1" href="">Trashed</a>
        </div>

       </div>
    </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width: 10%">Image</th>
                    <th scope="col" style="width: 20%">Title</th>
                    <th scope="col" style="width: 30%">Description</th>
                    <th scope="col" style="width: 10%">Category</th>
                    <th scope="col" style="width: 10%">Publish Date</th>
                    <th scope="col" style="width: 20%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>
                            <img src="{{asset('storage/'.$post->image)}}" width="80" alt=""/>
                        </td>
                        <td>{{$post->title}} </td>
                        <td>{{$post->description}} </td>
                        <td>{{$post->name}} </td>
                        <td>{{date('d-m-Y', strtoTime($post->updated_at))}}</td>
                        <td>
                            <a class="btn-sm btn-success btn" href="">Show</a>
                            <a class="btn-sm btn-primary btn" href="{{ route('posts.edit', $post->id)}}">Edit</a>
                            <a class="btn-sm btn-danger btn"  href="">Delete</a>
                        </td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
