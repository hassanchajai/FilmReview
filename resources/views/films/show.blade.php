@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="{{ asset($film->image) }}" style="height: auto" width="470px" />
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6  ">

                <h1 class="">{{ $film->title }}</h1>
                <ul class="list-inline">
                    <li>Date | {{ $film->created_at }}</li>
                </ul>
                <p class="lead">{{ $film->description }}</p>

            </div>

            {{-- <div class="col-lg-3  col-md-3 col-sm-12">
                <div class="well">
                    <h2>Subscription Box</h2>
                    <p>Form Description Goes here</p>
                    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
                </div>
                <div class="well">
                    <h2>Share love</h2>
                    <ul class="list-inline">
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>
                        
                    </ul>
                </div>
                <div class="well">
                    <h2>About Author</h2>
                    <img src="" class="img-rounded" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                    <a href="#" class="btn btn-default">Read more</a>
                </div>
                <div class="list-group">
                    <a class="list-group-item active" href="#"> <h4 class="list-group-item-heading">List group item heading</h4> <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> </a>
                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">List group item heading</h4> <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> </a>
                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">List group item heading</h4> <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> </a> </div>
                <div class="well">
                    <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla.</div> </div>
                    <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla.</div> </div>
                    <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla.</div> </div>
                </div>
            </div> --}}
        </div>
        {{-- replies --}}
        <div class=" mb-5 mt-5">
            <div class="container">
                @auth
                    <form action="{{ route('comments@store') }}" method="POST">
                        @csrf
                        Leave a response
                        <textarea cols="30" rows="4" name="comment" class="form-control">
                        </textarea>
                        <input type="hidden" name="film_id" value="{{ $film->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button class="btn btn-primary mt-3">Submit</button>
                    </form>
                @endauth

                <div class="row">
                    <div class="col-md-12">
                        <h3 class=" my-5">comment section :</h3>
                        <div class="row">
                            @foreach ($film->comments as $item)
                                <div class="col-md-12 ">
                                    <div class="media"> <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview"
                                            height="70" width="70"
                                            src="https://www.logolynx.com/images/logolynx/5c/5c5fbe66daa900ad13c9a0046596c465.png" />
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-8 d-flex">
                                                    <h5>{{ $item->user->name }} - </h5> <span>
                                                        {{ $item->created_at }}</span>
                                                </div>

                                            </div>{{ $item->comment }}
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                                
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- /container -->

@endsection
