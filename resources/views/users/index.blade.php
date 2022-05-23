@extends('layouts.app')

@section('content')
    {{-- toolbar --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <a class="btn btn-primary d-block mb-3" href="{{ route('users.create') }}">
                    <i class="fa fa-plus"></i>
                    <span>{{ __('créer') }}</span>
                </a>

                {{-- end toolbar --}}

                {{-- table --}}
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Liste des utilisateurs') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>

                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('users.edit', $user->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" class="btn-delete"
                                                    href="{{ route('users.destroy', $user->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Modal -->
@endsection

@section('scripts')
@endsection
