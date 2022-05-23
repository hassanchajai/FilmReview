@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- toolbar --}}
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('Posts@index') }}" class="list-group-item list-group-item-action">
                        All
                    </a>
                    @foreach ($categories as $item)
                        <a href="{{ route('Posts@index') . '?category=' . $item->id }}"
                            class="list-group-item list-group-item-action">
                            {{ $item->name }}
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="col-md-8 row ">
                @if (count($Posts) > 0)
                    @foreach ($Posts as $Post)
                        {{-- begin of column --}}

                        <div class="col-12  mb-3">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ asset($Post->image) }}" class="card-img"
                                            style="height: 100%;object-fit: cover" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $Post->title }}</h5>
                                            <p class="card-text">{{ $Post->description }}</p>
                                            <a href="{{ route('Posts@show', $Post->id) }}"
                                                class="btn btn-primary d-block">Read More</a>
                                            @auth

                                                @if (Auth::user()->role === 'admin' || auth()->user()->id == $Post->user_id)
                                                    <a href="{{ route('Posts@edit', $Post->id) }}"
                                                        class="btn btn-warning mb-1   ">Edit</a>
                                                    <form action="{{ route('Posts@destroy') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                        <input type="hidden" name="id" value="{{ $Post->id }}" />
                                                    </form>
                                                @endif


                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset($Post->image) }}" height="300"  class=" rounded-start"
                                        alt="{{ $Post->title }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body text-black">
                                        <h5 class="card-title">{{ $Post->title }}</h5>
                                        <p class="card-text">{{ $Post->description }}</p>


                                    </div>
                                </div>
                            </div> --}}

                        </div>

                        {{-- end of column --}}
                    @endforeach
                @else
                    <div class="col-12 text-center mt-4">
                        <h2>No Posts Found</h2>
                    </div>
                @endif



            </div>
        </div>
    </div>
@endsection
