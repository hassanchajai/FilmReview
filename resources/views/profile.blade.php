@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
     
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Détails du compte</div>
                <div class="card-body">
                    <form action="{{route("profile.updateName")}}" method="POST">
                        @csrf()
                        @method("post")
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username </label>
                            <input class="form-control" id="inputUsername" type="text" placeholder=""
                            name="name" value="{{auth()->user()->name}}" required>
                                
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Modifier le mot de passe</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>       
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{route('profile.updatePassword')}}" method="POST">
                        @csrf()
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">L'ancienne mot de passe</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="************"
                            name="password"
                                value="">
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">mot de passe</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="************"
                            name="newpassword"
                                value="">
                        </div>

                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection