@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add Post
                    </div>
                    <form class="card-body form-group" method="POST" enctype="multipart/form-data"
                        action="{{ route("Posts@update",$Post->id) }}">
                        @csrf
                        @method("PUT")
                        <label for="name">
                            Title :
                        </label>
                        <input type="text" class="form-control" value="{{$Post->title }}"  name="title" placeholder="Write Something ...">
                        <label for="price" class="mt-3">
                            Description :
                        </label>
                        <input type="text" class="form-control" value="{{$Post->description }}" name="description" placeholder="Write Something ...">
                        <label for="image" class="mt-3"> Image : </label>
                        <input type="file" class="form-control" name="image" placeholder="Write Something ...">
                        <label for="price" class="mt-3">
                            Category :
                        </label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" 
                                    {{ $item->id == $Post->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                
                            @endforeach
                        </select>
                        <label>Current Image :</label>
                        <img src="{{asset($Post->image)}}" class="img-fluid d-block" width="300" height="300" />
                        <input name="submit-form" value="update" type="submit" class="btn btn-primary px-4 mt-3" />
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

