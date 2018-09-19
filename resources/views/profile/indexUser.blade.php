@extends('layouts.userLayout')

@section('content')
    <div class="row">
        <div class="card">
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label >NOME<span class="star">*</span></label>
                    <input id="name" type="text" class="form-control"  name="name" value="{{ $user->name}}"  disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="cognome">COGNOME</label>
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
                    <label for="indirizzio">Indirizzion</label>
                    <input id="indirizzio" type="text" class="form-control" value="{{$user->indirizzio}}" name="indirizzio" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <a  href=" {!! url('profile/0') !!}" class="btn btn-lg btn" >Edit</a>
                </div>
            </div>
        </div>
        {{--<div class="col-sm-6">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-6">--}}
                {{--</div>--}}
                {{--<label>Before</label> <br>--}}
            {{--</div>--}}
            {{--<img  src="{{asset('img/').'/'.$progress->first_photo}}" class="img-responsive center-block" width="500" height="500" alt="Logo" /> <br>--}}
        {{--</div>--}}
    </div>
@endsection