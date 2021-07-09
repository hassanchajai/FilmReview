@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add Film
                    </div>
                    <form class="card-body form-group" method="POST" enctype="multipart/form-data"
                        action="{{ route("films@store") }}">
                        @csrf
                        <label for="name">
                            Title :
                        </label>
                        <input type="text" class="form-control" name="title" placeholder="Write Something ...">
                        <label for="price" class="mt-3">
                            Description :
                        </label>
                        <input type="text" class="form-control" name="desc" placeholder="Write Something ...">
                        <label for="image" class="mt-3"> Image : </label>
                        <input type="file" class="form-control" name="image" placeholder="Write Something ...">
                        <input name="submit-form" value="Add" type="submit" class="btn btn-primary px-4 mt-3" />
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
