@extends('layouts.userLayout')

@section('content')
    <div class="row">
        <div class="card">
            <br>
            <form method="POST" action="{!! url('profile') !!}">
                @csrf
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label >NOME<span class="star">*</span></label>
                        <input id="name" type="text" class="form-control"  name="name" value="{{ $user->name}}" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="cognome">COGNOME</label>
                        <input id="cognome" type="text" class="form-control" value="{{$user->cognome}}" name="cognome" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" value="{{$user->email}}" name="email" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" type="text" class="form-control" value="{{$user->telefono}}" name="telefono" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="indirizzio">Indirizzion</label>
                        <input id="indirizzio" type="text" class="form-control" value="{{$user->indirizzio}}" name="indirizzio" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit" >Invia</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection