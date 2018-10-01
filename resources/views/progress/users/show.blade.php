@extends('layouts.userLayout')

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
            {{--@foreach($peso as $pes)--}}
                {{--<div class="col-md-4"></div>--}}
                {{--<div class="form-group row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<label for="peso">Peso</label>--}}
                        {{--<input id="peso" type="number" class="form-control" value="{{$pes->peso}}" name="peso" disabled>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
            <div class="col-md-4"></div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="sesso">SESSO</label> <br>
                    @if($questionnare->sesso == 'MASCHIO')
                        <input id="mascio" type="radio" name="sesso" value="MASCHIO" checked>MASCHIO<br>
                        <input id="femmina" type="radio" name="sesso" value="FEMMINA">FEMMINA<br>
                    @elseif($questionnare->sesso == 'FEMMINA')
                        <input id="mascio" type="radio" name="sesso" value="MASCHIO">MASCHIO<br>
                        <input id="femmina" type="radio" name="sesso" value="FEMMINA" checked>FEMMINA<br>
                    @else
                        <input id="mascio" type="radio" name="sesso" value="MASCHIO">MASCHIO<br>
                        <input id="femmina" type="radio" name="sesso" value="FEMMINA">FEMMINA<br>
                    @endif
                </div>
            </div>
            {{--<div class="col-md-4"></div>--}}
            {{--<div class="form-group row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<label for="sesso">SESSO</label>--}}
                    {{--<input id="sesso" type="text" class="form-control" value="{{$progress->sesso}}" name="sesso" disabled>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4"></div>--}}
            {{--<div class="form-group row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<label for="kili_persi">CHILI PERSI</label>--}}
                    {{--<input id="kili_persi" type="text" class="form-control" value="{{$progress->kili_persi}}" name="kili_persi" disabled>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4"></div>--}}
            {{--<div class="form-group row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<label for="kili_presi">CHILI PRESI (UOMO)</label>--}}
                    {{--<input id="kili_presi" type="text" class="form-control" value="{{$progress->kili_presi}}" name="kili_presi" disabled>--}}
                {{--</div>--}}
            {{--</div>--}}
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
                    <input type="button" class="btn btn-lg btn-danger" onclick="location.href='{!! url('edit/progress/0') !!}';" value="Edit" />
                </div>
            </div>
            <hr>
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
                                <div class="col-md-6">
                                    <label for="peso">Peso {{$key + 1}}</label>
                                    <input id="peso" type="number" class="form-control" value="{{$value->peso}}" name="peso" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{$value->date->format('Y-m-d')}}" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <hr>
            @foreach($persi as $key => $value)
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('persi/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="chile_persi">CHILE PERSI {{$key + 1}}</label>
                                    <input id="chile_persi" type="number" class="form-control" value="{{$value->chile_persi}}" name="chile_persi" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{$value->date->format('Y-m-d')}}" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <hr>
            @foreach($presi as $key => $value)
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('presi/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}" name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="chile_presi">CHILE PRESI {{$key + 1}}</label>
                                    <input id="chile_presi" type="number" class="form-control" value="{{$value->chile_presi}}" name="chile_presi" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{$value->date->format('Y-m-d')}}" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

            <hr>
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