@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($isUpdate)
                    <div class="card">
                        <div class="card-header">
                            Update User
                        </div>
                        <form class="card-body form-group" method="POST" enctype="multipart/form-data"
                            action="{{ route('users.update', $user->id) }}">
                            @method('PUT')
                            @csrf
                            <label for="name">
                                name :
                            </label>
                            <input type="text" class="form-control" name="name" placeholder="Write Something ..."
                                value="{{ $user->name }}">
                            <label for="price" class="mt-3">
                                email :
                            </label>
                            <input type="text" class="form-control" name="email" placeholder="Write Something ..."
                                value="{{ $user->email }}">

                            <label for="price" class="mt-3">
                                Password :
                            </label>
                            <input type="text" class="form-control" name="password" placeholder="Write Something ..."
                                value="">


                            <input name="submit-form" value="Update" type="submit" class="btn btn-primary px-4 mt-3" />
                        </form>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            Add User
                        </div>
                        <form class="card-body form-group" method="POST" enctype="multipart/form-data"
                            action="{{ route('users.store') }}">
                            @csrf
                            <label for="name">
                                name :
                            </label>
                            <input type="text" class="form-control" name="name" placeholder="Write Something ...">
                            <label for="price" class="mt-3">
                                email :
                            </label>
                            <input type="text" class="form-control" name="email" placeholder="Write Something ...">

                            <label for="price" class="mt-3">
                                Password :
                            </label>
                            <input type="text" class="form-control" name="password" placeholder="Write Something ...">


                            <input name="submit-form" value="Add" type="submit" class="btn btn-primary px-4 mt-3" />
                        </form>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
