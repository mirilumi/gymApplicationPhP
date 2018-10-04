@extends('layouts.layout')

@section('content')
<div class="row">
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
                    <label for="email" >E-Mail Address<span class="star">*</span></label>
                    <input id="email" type="email" class="form-control"  value="{{$user->email}}"  name="email"  disabled>
                    </div>
                </div>
            <div class="col-md-4"></div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="name">TELEFONO <span class="star">*</span></label>
                        <input id="telefono" type="number" class="form-control" value="{{$user->telefono}}" name="telefono"  disabled autofocus>
                    </div>
                </div>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="name">INDIRIZZO</label>
                    <input id="indirizzio" type="text" class="form-control" value="{{$user->indirizzio}}" name="indirizzio" disabled>
                    </div>
                </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name">Programma</label>
                        <input id="amount" type="text" class="form-control" value="{{$user->purchase}}" name="amount" disabled>
                    </div>
                </div>
                </div>
        </div>
</div>
@endsection