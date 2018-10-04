@extends('layouts.layout')

@section('content')
    <div class="row" style="background-color: white;color: black">
        <div class="card">
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label >Nome<span class="star">*</span></label>
                    <input id="name" type="text" class="form-control"  name="name" value="{{ $user->name}}"  disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="cognome">Cognome</label>
                    <input id="cognome" type="text" class="form-control" value="{{$user->cognome}}" name="cognome" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" value="{{$user->email}}" name="email" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="telefono">Telefono</label>
                    <input id="telefono" type="text" class="form-control" value="{{$user->telefono}}" name="telefono" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="indirizzio">Indirizzo</label>
                    <input id="indirizzio" type="text" class="form-control" value="{{$user->indirizzio}}" name="indirizzio" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <img src="{{asset('img/').'/'.$user->image}}"  class="img-responsive center-block" alt="Logo" />
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <input type="button" class="btn btn-lg btn-danger" onclick="location.href='{!! url('profile/0') !!}';" value="Modifica" />
                </div>
            </div>

        </div>
        {{--<div class="col-sm-6">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-6">--}}
                {{--</div>--}}
                {{--<label>Before</label> <br>--}}
            {{--</div>--}}
{{--            <img  src="{{asset('img/').'/'.$progress->first_photo}}" class="img-responsive center-block" width="500" height="500" alt="Logo" /> <br>--}}
        {{--</div>--}}
    </div>
@endsection