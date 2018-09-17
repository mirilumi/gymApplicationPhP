@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="card">

            <form method="POST" action="{!! url('progress/'.$user->id) !!}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="name">NOME<span class="star">*</span></label>
                    <input id="name" type="text" class="form-control"   value="{{ $questionnare->name}}"  name="name" >
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="cognome">COGNOME</label>
                    <input id="cognome" type="text" class="form-control" value="{{$questionnare->cognome}}" name="cognome" >
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="peso">Peso</label>
                    <input id="peso" type="text" class="form-control" value="{{$questionnare->peso}}" name="pesso" >
                </div>
            </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="sesso">SESSO</label>
                        <input id="sesso" type="text" class="form-control" value="{{$progress->sesso}}" name="sesso" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="kili_persi">KILI PERSI</label>
                        <input id="kili_persi" type="text" class="form-control" value="{{$progress->kili_persi}}" name="kili_persi" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="kili_presi">KILI PRESI (UOMO)</label>
                        <input id="kili_presi" type="text" class="form-control" value="{{$progress->kili_presi}}" name="kili_presi" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="girovita">GIROVITA (UOMO)</label>
                        <input id="girovita" type="text" class="form-control" value="{{$progress->girovita}}" name="girovita" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="girocoscia">GIROCOSCIA (DONNA)</label>
                        <input id="girocoscia" type="text" class="form-control" value="{{$progress->girocoscia}}" name="girocoscia" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="fianchi">FIANCHI (DONNA)</label>
                        <input id="fianchi" type="text" class="form-control" value="{{$progress->fianchi}}" name="fianchi" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="circonferenza_toracica">CIRCONFERENZA TORACICA (UOMO)</label>
                        <input id="circonferenza_toracica" type="text" class="form-control" value="{{$progress->circonferenza_toracica}}" name="circonferenza_toracica" >
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="note">Note</label>
                        <textarea  placeholder="Note"
                                   id="note" name="note" class="form-control" >{{$progress->note}}</textarea>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="note">Before</label>
                        <input type="file" name="first_photo" /><br/><br/>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="note">After</label>
                        <input type="file" name="second_photo" /><br/><br/>
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