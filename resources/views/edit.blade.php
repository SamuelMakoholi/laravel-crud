@extends('layouts.master')

@section('content')

<div class="main-content mt-5">
    <div class="card">
    <div class="card-header">
       <div class="row">
        <div class="col-md-6 fw-bold">
            Edit Post
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            {{-- <a class="btn btn-success mx-1" href="">Create</a> --}}
            <a class="btn btn-primary mx-1" href="{{route('posts.index')}}">Back</a>
        </div>
        @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li class="list-item">{{$error}}</li>
            </div>
        @endforeach
    @endif

       </div>
    </div>
        <div class="card-body">
          <h5>Edit Post</h5>
          <form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
               <div>
                <img src="{{asset('storage/'.$post->image)}}" width="200px" alt="" />
               </div>
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control">
            </div>


            <div class="form-group">
                <label for="" class="form-label">Category</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $category)
                    <option {{$category->id == $post->category_id ? 'selected' : ''}}
                        value="{{ $category->id}}">{{ $category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="" class="form-label">Description</label>
                <textarea cols="30" rows="5" name="description" class="form-control">{{ $post->description}}</textarea>
            </div>

            <div class="form-group mt-5">
                <button class="btn btn-primary">Submit</button>
            </div>

          </form>
        </div>
    </div>
</div>
@endsection
