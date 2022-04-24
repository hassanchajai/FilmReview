@extends('layouts.app')

@section('content')
    {{-- toolbar --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <button class="btn btn-primary d-block mb-3" data-toggle="modal" data-target="#myModal" style="margin-left: auto">
                    <i class="fa fa-plus"></i>
                    <span>{{ __('créer') }}</span>
                </button>
            
                {{-- end toolbar --}}
            
                {{-- table --}}
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Liste des catégories') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                   
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category )
                                        
                                    <tr>
                                      <th scope="row">{{$category->id}}</th>
                                      <td>{{$category->name}}</td>
                                      <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-edit-{{ $category->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a class="btn btn-danger"  class="btn-delete" href="{{ route('categories@destroy', $category->id) }}"   
                                        >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                      </td>
                                 
                                    </tr>
                                    <div class="modal fade" id="modal-edit-{{ $category->id }}"  tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        &times
                                                    </button>
                                                </div>
                                                <form class="needs-validation was-validated" method="post" novalidate action="{{route("categories@update",$category->id)}}">
                                                    @csrf()
                                                    @method("PUT")
                                                    <div class="modal-body">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="inputEmail">Nom </label>
                                                            <input type="text" class="form-control" id="inputEmail" name="name"
                                                                placeholder="Nom " required value="{{$category->name}}">
                                                            @error('name')
                                                                <span class=" text-danger">š'il vous plaît offrit un nom valid</span>
                                                            @enderror
                                                        </div>
                                                   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        &times
                    </button>
                </div>
                <form class="needs-validation was-validated" method="post"action="{{route('categories@store')}}" novalidate>
                    @csrf()
                    <div class="modal-body">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="inputEmail">Nom </label>
                            <input type="text" class="form-control" id="inputEmail" name="name"
                                placeholder="Nom " required value="{{old('name')}}">
                            @error('name')
                                <span class=" text-danger">š'il vous plaît offrit un nom valid</span>
                            @enderror
                        </div>
                  


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  
@endsection
