@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="card">
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label >NOME<span class="star">*</span></label>
                    <input id="name" type="text" class="form-control"  name="name" value="{{ $questionnare->name}}"  disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">

                <div class="col-md-6">
                    <label for="cognome">COGNOME</label>
                    <input id="cognome" type="text" class="form-control" value="{{$questionnare->cognome}}" name="cognome" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="peso">Peso</label>
                    <input id="peso" type="text" class="form-control" value="{{$questionnare->peso}}" name="peso" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="sesso">SESSO</label>
                    <input id="sesso" type="text" class="form-control" value="{{$progress->sesso}}" name="sesso" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="kili_persi">CHILI PERSI</label>
                    <input id="kili_persi" type="text" class="form-control" value="{{$progress->kili_persi}}" name="kili_persi" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="kili_presi">CHILI PRESI (UOMO)</label>
                    <input id="kili_presi" type="text" class="form-control" value="{{$progress->kili_presi}}" name="kili_presi" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="girovita">GIROVITA (UOMO)</label>
                    <input id="girovita" type="text" class="form-control" value="{{$progress->girovita}}" name="girovita" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="girocoscia">GIROCOSCIA (DONNA)</label>
                    <input id="girocoscia" type="text" class="form-control" value="{{$progress->girocoscia}}" name="girocoscia" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="fianchi">FIANCHI (DONNA)</label>
                    <input id="fianchi" type="text" class="form-control" value="{{$progress->fianchi}}" name="fianchi" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="circonferenza_toracica">CIRCONFERENZA TORACICA (UOMO)</label>
                    <input id="circonferenza_toracica" type="text" class="form-control" value="{{$progress->circonferenza_toracica}}" name="circonferenza_toracica" disabled>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="note">Note</label>
                     <textarea  placeholder="Note"
                       id="note" name="note" class="form-control" disabled>{{$progress->note}}</textarea>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    {{--<a  href=" {!! url('edit/progress/'.$user->id) !!}" class="btn btn-lg btn" >Edit</a>--}}
                    <input type="button" class="btn btn-lg btn-danger" onclick="location.href='{!! url("edit/progress/".$user->id) !!}';" value="Edit" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
            <div class="col-sm-6">
            </div>
                <label>Prima</label> <br>
            </div>
            <img  src="{{asset('img/').'/'.$progress->first_photo}}" class="img-responsive center-block" width="500" height="500" alt="Logo" /> <br>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <label>Dopo</label> <br>
            </div>
            <img  src="{{asset('img/').'/'.$progress->second_photo}}" class="img-responsive center-block" width="500" height="500" alt="Logo" />
        </div>
    </div>
@endsection