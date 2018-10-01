@extends('layouts.userLayout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white">
                <div class="x_content" style="background-color: white">
                    <div class="row">
                        <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-4"></div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4"></div>--}}
                                {{--</div>--}}
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h1>Questionario Maestro del Fitness</h1><br>
                                                <h3>Compila in modo accurato</h3>
                                            </div>


                                            <form action="{{route('createQuestionare')}}" method="POST" >
                                                @csrf
                                                <br>
                                                <input name="user_id" type="hidden" value="{{$user->id}}"/>
                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address<span class="star">*</span></label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="La tua Email" name="email" value="{{$questionnare->email}}" required>

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">NOME<span class="star">*</span></label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Rispondi Qui" name="name" value="{{$questionnare->name}}" required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">COGNOME<span class="star">*</span></label>

                                                    <div class="col-md-6">
                                                        <input id="cognome" type="text" class="form-control{{ $errors->has('cognome') ? ' is-invalid' : '' }}" placeholder="Rispondi Qui" name="cognome" value="{{$questionnare->cognome}}" required autofocus>

                                                        @if ($errors->has('cognome'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('cognome') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="sesso" class="col-md-4 col-form-label text-md-right">SESSO</label>
                                                    <div class="col-md-6">

                                                        <input id="mascio" type="radio" name="sesso" {{ $questionnare->sesso == 'MASCHIO' ? 'checked' : ''}} value="MASCHIO" {{ $questionnare->gender == 'Male' ? 'selected' : ''}}>MASCHIO<br>
                                                        <input id="femmina" type="radio" name="sesso" {{ $questionnare->sesso == 'FEMMINA' ? 'checked' : ''}} value="FEMMINA">FEMMINA<br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="peso" class="col-md-4 col-form-label text-md-right">PESO (KG)</label>

                                                    <div class="col-md-6">
                                                        <input id="peso" type="number" class="form-control" placeholder="Rispondi Qui" name="peso" value="{{$questionnare->peso}}"  autofocus>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="altezza" class="col-md-4 col-form-label text-md-right">ALTEZZA (CM)</label>

                                                    <div class="col-md-6">
                                                        <input id="altezza" type="text" class="form-control" placeholder="Rispondi Qui" name="altezza" value="{{$questionnare->altezza}}"  autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="allenato" class="col-md-4 col-form-label text-md-right">ALLENATO</label>
                                                    <div class="col-md-6">

                                                        <input id="ALLENATO_FIRST" type="radio" name="allenato" {{ $questionnare->allenato == 'ALLENATO_FIRST' ? 'checked' : ''}} value="ALLENATO_FIRST">SI (Da un periodo minore a quello di un anno)
                                                        <br>
                                                        <input id="ALLENATO_FIRST" type="radio" name="allenato" {{ $questionnare->allenato == 'ALLENATO_SECOND' ? 'checked' : ''}} value="ALLENATO_SECOND">Si (Da un periodo maggiore a quello di un anno)<br>
                                                        <input id="ALLENATO_FIRST" type="radio" name="allenato" {{ $questionnare->allenato == 'ALLENATO_THIRD' ? 'checked' : ''}} value="ALLENATO_THIRD">No non sono allenato<br>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="struttura_programma" class="col-md-4 col-form-label text-md-right">STRUTTURA PROGRAMMA (QUANTI GIORNI POTRESTI ALLENARTI)</label>
                                                    <div class="col-md-6">

                                                        <input id="STRUTTURA_PROGRAMMA_FIRST" type="radio" name="struttura_programma" {{ $questionnare->struttura_programma == 'STRUTTURA_PROGRAMMA_FIRST' ? 'checked' : ''}}  value="STRUTTURA_PROGRAMMA_FIRST">1<br>
                                                        <input id="STRUTTURA_PROGRAMMA_SECOND" type="radio" name="struttura_programma" {{ $questionnare->struttura_programma == 'STRUTTURA_PROGRAMMA_SECOND' ? 'checked' : ''}}  value="STRUTTURA_PROGRAMMA_SECOND">2<br>
                                                        <input id="STRUTTURA_PROGRAMMA_THIRD" type="radio" name="struttura_programma" {{ $questionnare->struttura_programma == 'STRUTTURA_PROGRAMMA_THIRD' ? 'checked' : ''}}  value="STRUTTURA_PROGRAMMA_THIRD">3<br>
                                                        <input id="STRUTTURA_PROGRAMMA_FORTH" type="radio" name="struttura_programma" {{ $questionnare->struttura_programma == 'STRUTTURA_PROGRAMMA_FORTH' ? 'checked' : ''}} value="STRUTTURA_PROGRAMMA_FORTH">4<br>
                                                        <input id="STRUTTURA_PROGRAMMA_FIFTH" type="radio" name="struttura_programma" {{ $questionnare->struttura_programma == 'STRUTTURA_PROGRAMMA_FIFTH' ? 'checked' : ''}} value="STRUTTURA_PROGRAMMA_FIFTH">5<br>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="durata_allenamento" class="col-md-4 col-form-label text-md-right">DURATA ALLENAMENTO</label>
                                                    <div class="col-md-6">

                                                        <input id="DURATA_ALLENAMENTO_FIRST" type="radio" name="durata_allenamento" {{ $questionnare->durata_allenamento == 'DURATA_ALLENAMENTO_FIRST' ? 'checked' : ''}} value="DURATA_ALLENAMENTO_FIRST">40 / 60 MINUTI<br>
                                                        <input id="DURATA_ALLENAMENTO_SECOND" type="radio" name="durata_allenamento" {{ $questionnare->durata_allenamento == 'DURATA_ALLENAMENTOA_SECOND' ? 'checked' : ''}} value="DURATA_ALLENAMENTOA_SECOND">60 /90 MINUTI<br>
                                                        <input id="DURATA_ALLENAMENTO_THIRD" type="radio" name="durata_allenamento" {{ $questionnare->durata_allenamento == 'DURATA_ALLENAMENTO_THIRD' ? 'checked' : ''}} value="DURATA_ALLENAMENTO_THIRD">90 /180 MINUTI<br>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="first_question" class="col-md-4 col-form-label text-md-right">HAI SUBITO INTERVENTI? SE SI QUALI?</label>

                                                    <div class="col-md-6">
                                                        <input id="first_question" type="text" class="form-control" placeholder="Rispondi Qui" name="first_question" value="{{$questionnare->first_question}}"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="second_question" class="col-md-4 col-form-label text-md-right">HAI SUBITO DEI TRAUMI? SOFFRI DI QUALCHE DISTURBO? AVVERTI DOLORI IN PARTICOLARE?</label>

                                                    <div class="col-md-6">
                                                        <input id="second_question" type="text" class="form-control" placeholder="Rispondi Qui" name="second_question" value="{{$questionnare->second_question}}"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="third_question" class="col-md-4 col-form-label text-md-right">UTILIZZI INTEGRATORI? SE SI QUALI E COME?</label>

                                                    <div class="col-md-6">
                                                        <input id="third_question" type="text" class="form-control" placeholder="Rispondi Qui" name="third_question" value="{{$questionnare->second_question}}"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="forth_question" class="col-md-4 col-form-label text-md-right">ASSUMI DEI FARMACI SPECIFICI?SE SI QUALI?</label>

                                                    <div class="col-md-6">
                                                        <input id="forth_question" type="text" class="form-control" placeholder="Rispondi Qui" name="forth_question" value="{{$questionnare->forth_question}}"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="fifth_question" class="col-md-4 col-form-label text-md-right">SPECIFICA I TUOI OBIETTIVI</label>

                                                    <div class="col-md-6">
                                                        <input id="fifth_question" type="text" class="form-control" placeholder="Rispondi Qui" name="fifth_question" value="{{$questionnare->fifth_question}}"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="sixth_question" class="col-md-4 col-form-label text-md-right">OBIETTIVO DETTAGLIATO <span class="star">*</span></label>
                                                    <div class="col-md-6">

                                                        <input id="SIXTH_QUESTION_FIRST" type="radio" name="sixth_question" {{ $questionnare->sixth_question == 'SIXTH_QUESTION_FIRST' ? 'checked' : ''}} value="SIXTH_QUESTION_FIRST" required>AUMENTO FORZA<br>
                                                        <input id="SIXTH_QUESTION_SECOND" type="radio" name="sixth_question" {{ $questionnare->sixth_question == 'SIXTH_QUESTION_SECOND' ? 'checked' : ''}} value="SIXTH_QUESTION_SECOND">TONIFICAZIONE / DIMAGRIMENTO<br>
                                                        <input id="SIXTH_QUESTION_THIRD" type="radio" name="sixth_question" {{ $questionnare->sixth_question == 'SIXTH_QUESTION_THIRD' ? 'checked' : ''}} value="SIXTH_QUESTION_THIRD">RESISTENZA<br>
                                                        <input id="SIXTH_QUESTION_FORTH" type="radio" name="sixth_question" {{ $questionnare->sixth_question == 'SIXTH_QUESTION_FORTH' ? 'checked' : ''}} value="SIXTH_QUESTION_FORTH">AUMENTO MASSA<br>
                                                        <input id="SIXTH_QUESTION_FIFTH" type="radio" name="sixth_question" {{ $questionnare->sixth_question == 'SIXTH_QUESTION_FIFTH' ? 'checked' : ''}} value="SIXTH_QUESTION_FIFTH">ALTRO<br>


                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="seventh_question" class="col-md-4 col-form-label text-md-right">Dove Vorresti allenarti Principalmente? <span class="star">*</span></label>
                                                    <div class="col-md-6">

                                                        <input id="SEVENTH_QUESTION_FIRST" type="radio" name="seventh_question" {{ $questionnare->seventh_question == 'SEVENTH_QUESTION_FIRST' ? 'checked' : ''}} value="SEVENTH_QUESTION_FIRST" required>Palestra<br>
                                                        <input id="SEVENTH_QUESTION_SECOND" type="radio" name="seventh_question" {{ $questionnare->seventh_question == 'SEVENTH_QUESTION_SECOND' ? 'checked' : ''}} value="SEVENTH_QUESTION_SECOND">A casa con l'aiuto di Attrezzi<br>
                                                        <input id="SEVENTH_QUESTION_THIRD" type="radio" name="seventh_question" {{ $questionnare->seventh_question == 'SEVENTH_QUESTION_THIRD' ? 'checked' : ''}} value="SEVENTH_QUESTION_THIRD">A casa senza l'aiuto di alcun Attrezzo<br>
                                                        <input id="SEVENTH_QUESTION_FORTH" type="radio" name="seventh_question" {{ $questionnare->seventh_question == 'SEVENTH_QUESTION_FORTH' ? 'checked' : ''}} value="SEVENTH_QUESTION_FORTH">All'Aperto senza l'uso di Attrezzi<br>
                                                        <input id="SEVENTH_QUESTION_FIFTH" type="radio" name="seventh_question" {{ $questionnare->seventh_question == 'SEVENTH_QUESTION_FIFTH' ? 'checked' : ''}} value="SEVENTH_QUESTION_FIFTH">All'Aperto con l'uso di Attrezzi<br>


                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="eighth_question" class="col-md-4 col-form-label text-md-right">Specifica di quali Attrezzi disponi:</label>

                                                    <div class="col-md-6">
                                                        <input id="eighth_question" type="text" class="form-control" placeholder="Rispondi Qui" name="eighth_question" value="{{$questionnare->eighth_question}}"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ninth_question" class="col-md-4 col-form-label text-md-right">NOTE: VUOI AGGIUNGERE QUALCOSA CHE POTREBBE ESSERCI SFUGGITO?</label>

                                                    <div class="col-md-6">
                                                        <input id="ninth_question" type="text" class="form-control" placeholder="Rispondi Qui" name="ninth_question" value="{{$questionnare->ninth_question}}"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="eta" class="col-md-4 col-form-label text-md-right">Età <span class="star">*</span></label>

                                                    <div class="col-md-6">
                                                        <input id="eta" type="text" class="form-control" placeholder="Rispondi Qui" name="eta" value="{{$questionnare->eta}}"  autofocus required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ten_question" class="col-md-4 col-form-label text-md-right">Codice Fiscale (Per Ricevere la Fattura) <span class="star">*</span></label>

                                                    <div class="col-md-6">
                                                        <input id="ten_question" type="text" class="form-control" placeholder="Rispondi Qui" name="ten_question" value="{{$questionnare->ten_question}}"  autofocus required>
                                                    </div>
                                                </div>
                                                {{--<button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit" >Invia</button>--}}
                                            </form>
                                            <div class="card-header text-center">
                                                <h6 style="color: red">* Required</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!--<div class="col-md-2"></div>-->
            <!--<h3 class="form-signin-heading">Second Box</h3>-->
            <div style="background: #f6f6f6; color: black;" >
                <!--<h3>DISCLAIMER TEXT:</h3>-->
                <p>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <br>COPYRIGHT <br>
                Questo Programma Personalizzato, sistema online, dominio, contenuti ed il materiale in esso contenuto possono costituire opere dell’ingegno e pertanto possono essere tutelati dalla legge sul diritto d’autore. La violazione dei diritti in essa previsti può quindi comportare l’applicazione delle sanzioni penali o amministrative previste dagli art. 171, 171-bis, 171-ter, 174-bis e 174-ter della legge 22 aprile 1941, n. 633, oltre alle sanzioni civili previste dal codice civile italiano.
                Le opere delle quali viene indicata la fonte sono di proprietà esclusiva dei rispettivi <a>titolari </a> dei diritti e dei loro aventi causa. Ove non diversamente indicato, tutti i diritti appartengono in via esclusiva a Maestrodelfitness.com.
                Il materiale contenuto in questo Programma non può pertanto essere riprodotto, con qualsiasi mezzo analogico o digitale, in modo diretto o indiretto, temporaneamente o permanentemente, in tutto o in parte, senza l’autorizzazione scritta di Maestrodelfitness.com o dei rispettivi <a href="http://www.maestrodelfitness.com/5/5.html"> titolari </a>
                Tutti i marchi, registrati e non, e altri segni distintivi presenti nel Programma personalizzato appartengono ai legittimi proprietari e non sono concessi in licenza né in alcun modo fatti oggetto di disposizione, salvo espressamente indicato. È fatto in particolare divieto di utilizzare il logo, le immagini e la grafica di maestrodelfitness, senza il preventivo consenso scritto di Maestrodelfitness.
                In ogni caso chi intende utilizzare i nostri contenuti, avviare una collaborazione, partecipare al lavoro della pagina può farne richiesta per email scrivendo a: <a> info@maestrodelfitness.com </a>
                Ulteriori dettagli riguardanti i termini del servizio sono consultabili <a href="http://www.maestrodelfitness.com/5/5.html">cliccando qui</a>
                {{--<div class="row">--}}
                    {{--<div class="col-md-4"></div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4"></div>--}}
                {{--</div>--}}

                <br>AVVERTENZE:<br>
                Tutte le informazioni contenute nel seguente programma non intendono sostituirsi in alcun modo al parere di medici professionisti. E/o specialisti del settore. L'allenamento con sovraccarichi può causare infortuni, si consiglia pertanto di eseguire esercizi prestando la massima attenzione utilizzando soltanto metodologie e carichi adatti al proprio livello di preparazione. L'autore (Maestrodelfitness.com) è sollevato da ogni tipo di responsabilità in merito all'utilizzo improprio delle informazioni trasmesse dal seguente sito web www.maestrodelfitness.com. In caso di bisogno o dubbio consultare il parere di un medico prima di intraprendere qualsiasi tipo di attività fisica o programma alimentare. </p>
            </div>
            <!--<div class="col-md-2"></div>-->
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
