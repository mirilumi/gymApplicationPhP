@extends('layouts.userLayout')

@section('content')
    <div class="row">
        <div class="card">

            <form method="POST" action="{!! url('progress/0') !!}" enctype="multipart/form-data">
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
                        <label for="sesso">SESSO</label>
                        <input id="sesso" type="text" class="form-control" value="{{$progress->sesso}}" name="sesso" >
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
                        <label for="note">Prima</label>
                        <input type="file" name="first_photo" /><br/><br/>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="note">Dopo</label>
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
            <br>
            @foreach($peso as $key => $value)
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('peso/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="peso">Peso {{$key + 1}}</label>
                                    <input id="peso" type="number" class="form-control" value="{{$value->peso}}" name="peso">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Edit Peso</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('peso.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="peso" type="number" class="form-control"  name="peso">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Add Peso</button>
                    </div>
                </form>
            </div>
            @foreach($persi as $key => $value)
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('persi/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="chile_persi">CHILE PERSI {{$key + 1}}</label>
                                    <input id="chile_persi" type="number" class="form-control" value="{{$value->chile_persi}}" name="chile_persi">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Edit Chile Persi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('persi.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="chile_persi" type="number" class="form-control"  name="chile_persi">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Add Chile Persi</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('peso.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="peso" type="number" class="form-control"  name="peso">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Add Peso</button>
                    </div>
                </form>
            </div>
            @foreach($presi as $key => $value)
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('presi/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="chile_presi">CHILE PRESI {{$key + 1}}</label>
                                    <input id="chile_presi" type="number" class="form-control" value="{{$value->chile_presi}}" name="chile_presi">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Edit Chile Presi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('presi.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="chile_presi" type="number" class="form-control"  name="chile_presi">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Add Chile Presi</button>
                    </div>
                </form>
            </div>
            {{--<div class="col-md-4"></div>--}}
            {{--<div class="form-group row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<label for="kili_presi">CHILI PRESI (UOMO)</label>--}}
                    {{--<input id="kili_presi" type="text" class="form-control" value="{{$progress->kili_presi}}" name="kili_presi" >--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection