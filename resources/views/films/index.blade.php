@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (count($films) > 0)
                @foreach ($films as $film)
                    {{-- begin of column --}}
                <a href="{{route("films@show",$film->id)}}">
                    <div class="col-md-12  mb-3 card">
                        
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset($film->image) }}" height="300" width="300" class=" rounded-start"
                                        alt="{{ $film->title }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $film->title }}</h5>
                                        <p class="card-text">{{ $film->description }}</p>
                                        @auth
                                            @if (Auth::user()->role==="admin")
                                            <a href="{{route("films@edit",$film->id)}}" class="btn btn-warning" >Edit</a>
                                           <form action="{{ route("films@destroy") }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                            <input type="hidden" name="id" value="{{ $film->id }}"/>
                                           </form>
                                            @endif
                                        @endauth

                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </a>
                    {{-- end of column --}}
                @endforeach
            @else

                <div class="col-12 text-center mt-4">
                    <h2>No films Found</h2>
                </div>

            @endif



        </div>
    </div>
@endsection
