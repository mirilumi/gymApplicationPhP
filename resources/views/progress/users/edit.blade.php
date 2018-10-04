@extends('layouts.userLayout')

@section('content')
    <div class="row" style="background-color: white;color: black">
        <div class="card">

            <form method="POST" action="{!! url('progress/0') !!}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <br>
                <div class="col-md-4"></div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="name">Nome<span class="star">*</span></label>
                        <input id="name" type="text" class="form-control" value="{{ $questionnare->name}}" name="name">
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="cognome">Cognome</label>
                        <input id="cognome" type="text" class="form-control" value="{{$questionnare->cognome}}"
                               name="cognome">
                    </div>
                </div>
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
                        {{--<label for="girovita">GIROVITA (UOMO)</label>--}}
                        {{--<input id="girovita" type="text" class="form-control" value="{{$progress->girovita}}"--}}
                               {{--name="girovita">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4"></div>--}}
                {{--<div class="form-group row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<label for="girocoscia">GIROCOSCIA (DONNA)</label>--}}
                        {{--<input id="girocoscia" type="text" class="form-control" value="{{$progress->girocoscia}}"--}}
                               {{--name="girocoscia">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4"></div>--}}
                {{--<div class="form-group row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<label for="fianchi">FIANCHI (DONNA)</label>--}}
                        {{--<input id="fianchi" type="text" class="form-control" value="{{$progress->fianchi}}"--}}
                               {{--name="fianchi">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4"></div>--}}
                {{--<div class="form-group row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<label for="circonferenza_toracica">CIRCONFERENZA TORACICA (UOMO)</label>--}}
                        {{--<input id="circonferenza_toracica" type="text" class="form-control"--}}
                               {{--value="{{$progress->circonferenza_toracica}}" name="circonferenza_toracica">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="note">Prima</label>
                        <input type="file" name="first_photo"/><br/><br/>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="note">Dopo</label>
                        <input type="file" name="second_photo"/><br/><br/>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit">Invia
                        </button>
                    </div>
                </div>
            </form>
            <hr>
            <br>
            @foreach($peso as $key => $value)
                @if($key == 0)
                <div class="col-md-4">
                    <a href=" {!! url('chart/peso/0') !!}" class="btn btn-dark">Vedi Grafico</a>
                </div>
                @else
                    <div class="col-md-4">
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('peso/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                                   name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="peso">Peso {{$key + 1}}</label>
                                    <input id="peso" type="number" class="form-control" value="{{$value->peso}}"
                                           name="peso">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Modifica Peso
                                    </button>
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
                        <input id="peso" type="number" class="form-control" name="peso">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                               name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Scrivi il tuo peso</button>
                    </div>
                </form>
            </div>
            <hr>
            @foreach($persi as $key => $value)
                @if($key == 0)
                    <div class="col-md-4">
                        <a href=" {!! url('chart/persi/0') !!}" class="btn btn-dark">Vedi Grafico</a>
                    </div>
                @else
                    <div class="col-md-4">
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('persi/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                                   name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="chile_persi">CHILE PERSI {{$key + 1}}</label>
                                    <input id="chile_persi" type="number" class="form-control"
                                           value="{{$value->chile_persi}}" name="chile_persi">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Modifica Chile
                                        Persi
                                    </button>
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
                        <input id="chile_persi" type="number" class="form-control" name="chile_persi">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                               name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Scrivi i chili persi</button>
                    </div>
                </form>
            </div>
            <br>
            <hr>
            @foreach($presi as $key => $value)
                @if($key == 0)
                    <div class="col-md-4">
                        <a href=" {!! url('chart/presi/0') !!}" class="btn btn-dark">Vedi Grafico</a>
                    </div>
                @else
                    <div class="col-md-4">
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('presi/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                                   name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="chile_presi">CHILE PRESI {{$key + 1}}</label>
                                    <input id="chile_presi" type="number" class="form-control"
                                           value="{{$value->chile_presi}}" name="chile_presi">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Modifica Chile
                                        Presi
                                    </button>
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
                        <input id="chile_presi" type="number" class="form-control" name="chile_presi">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                               name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Scrivi i chili presi</button>
                    </div>
                </form>
            </div>
            <hr>
            @foreach($girocoscia as $key => $value)
                @if($key == 0)
                    <div class="col-md-4">
                        <a href=" {!! url('chart/girocoscia/0') !!}" class="btn btn-dark">Vedi Grafico</a>
                    </div>
                @else
                    <div class="col-md-4">
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('girocoscia/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                                   name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="girocoscia">GIROCOSCIA {{$key + 1}}</label>
                                    <input id="girocoscia" type="number" class="form-control" value="{{$value->girocoscia}}"
                                           name="girocoscia">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Modifica GIROCOSCIA
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('girocoscia.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="girocoscia" type="number" class="form-control" name="girocoscia">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                               name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Misura Girocoscia</button>
                    </div>
                </form>
            </div>
            <hr>
            @foreach($girovita as $key => $value)
                @if($key == 0)
                    <div class="col-md-4">
                        <a href=" {!! url('chart/girocoscia/0') !!}" class="btn btn-dark">Vedi Grafico</a>
                    </div>
                @else
                    <div class="col-md-4">
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('girovita/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                                   name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="girovita">GIROVITA {{$key + 1}}</label>
                                    <input id="girovita" type="number" class="form-control" value="{{$value->girovita}}"
                                           name="girovita">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Modifica GIROVITA
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('girovita.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="girovita" type="number" class="form-control" name="girovita">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                               name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Misura Girovita</button>
                    </div>
                </form>
            </div>
            <hr>
            @foreach($fianchi as $key => $value)
                @if($key == 0)
                    <div class="col-md-4">
                        <a href=" {!! url('chart/girocoscia/0') !!}" class="btn btn-dark">Vedi Grafico</a>
                    </div>
                @else
                    <div class="col-md-4">
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('fianchi/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                                   name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fianchi">FIANCHI {{$key + 1}}</label>
                                    <input id="fianchi" type="number" class="form-control" value="{{$value->fianchi}}"
                                           name="fianchi">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Modifica FIANCHI
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('fianchi.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="fianchi" type="number" class="form-control" name="fianchi">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                               name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Misura Fianchi</button>
                    </div>
                </form>
            </div>
            <hr>
            @foreach($cft as $key => $value)
                @if($key == 0)
                    <div class="col-md-4">
                        <a href=" {!! url('chart/cft/0') !!}" class="btn btn-dark">Vedi Grafico</a>
                    </div>
                @else
                    <div class="col-md-4">
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <form method="POST" action="{!! url('cft/'.$value->id) !!}">
                            <input type="hidden" name="_method" value="PUT">
                            <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                                   name="questionare_id">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="circonferenza_toracia">CIRCONFERENZA TORACIA {{$key + 1}}</label>
                                    <input id="circonferenza_toracia" type="number" class="form-control" value="{{$value->circonferenza_toracia}}"
                                           name="circonferenza_toracia">
                                </div>
                                <div class="col-md-4">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control"
                                           value="{{$value->date->format('Y-m-d')}}">
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <button type="Submit" class="form-control btn btn-sm btn btn-danger">Modifica CIRCONFERENZA TORACIA
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <br>
            <div class="col-md-4"></div>
            <div class="form-group row">
                <form method="POST" action="{!! route('cft.store') !!}">
                    @csrf
                    <div class="col-md-4">
                        <input id="circonferenza_toracia" type="number" class="form-control" name="circonferenza_toracia">
                        <input id="questionare_id" type="hidden" class="form-control" value="{{$questionnare->id}}"
                               name="questionare_id">
                    </div>
                    <div class="col-md-2">
                        <button type="Submit" class="btn btn-sm btn btn-danger">Misura Circonferenza Toracica</button>
                    </div>
                </form>
            </div>
            <hr>
            {{--<a href="{!! url('chart/0') !!}" class="btn btn-sm btn btn-danger">See Chart</a>--}}

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