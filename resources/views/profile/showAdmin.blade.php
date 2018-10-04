@extends('layouts.layout')

@section('content')
    <div class="row" style="background-color: white;color: black">
        <div class="card">
            <br>
            <form method="POST" action="{!! url('profile') !!}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label >Nome<span class="star">*</span></label>
                        <input id="name" type="text" class="form-control"  name="name" value="{{ $user->name}}" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="cognome">Cognome</label>
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
                        <label for="indirizzio">Indirizzo</label>
                        <input id="indirizzio" type="text" class="form-control" value="{{$user->indirizzio}}" name="indirizzio" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="note">Photo</label>
                        <input type="file" name="userPhoto" /><br/><br/>
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