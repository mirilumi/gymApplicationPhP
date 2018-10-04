@extends('layouts.login_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250"
                     height="250" alt="Logo"/>
            </div>
            <div class="col-md-4"></div>
        </div>
        @if ($message = Session::get('success'))
            <div class="card">
                <div class="card-header text-center">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                    <p style="color:green;">{!! $message !!}</p>
                </div>
            </div>
            <?php Session::forget('success');?>
        @endif
        @if ($message = Session::get('error'))
            <div class="card">
                <div class="card-header text-center">
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                    <p> style="color:red;"{!! $message !!}</p>
                </div>
            </div>
            <?php Session::forget('error');?>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Iscriviti alla Community</h1><br>
                    </div>
                    <form action="{{route('paySecond')}}" method="POST">
                        @csrf
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome<span
                                        class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="Nome" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Cognome</label>

                            <div class="col-md-6">
                                <input id="cognome" type="text"
                                       class="form-control{{ $errors->has('cognome') ? ' is-invalid' : '' }}"
                                       placeholder="Cognome" name="cognome" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address<span
                                        class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="La tua Email" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">TELEFONO <span class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control" placeholder="Telefono"
                                       name="telefono" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">INDIRIZZO</label>

                            <div class="col-md-6">
                                <input id="indirizzio" type="text" class="form-control" placeholder="Indirizzo"
                                       name="indirizzio" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label for="amount" class="col-md-12 col-form-label">Scegli il tuo programma</label>

                                <select id="amount" name="amount" class="form-control">
                                    <option value="24.99">3 Mesi Membership 24.99/Mese</option>
                                    <option value="19.99">6 Mesi Membership 19.99/Mese</option>
                                    <option value="14.99">12 Mesi Membership 14.99/Mese</option>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required="required">
                                Ho preso visione e accetto tutti i Termini e le condizioni visuliazzabili alla seguente
                                <a href="http://www.maestrodelfitness.com/5/5.html">Pagina</a>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input class="btn btn-sm btn btn-block" src="{{asset('/images/paypalbutton.jpeg')}}"
                                       name="Submit" value="Pay" type="image"/>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <img src="{{asset('/images/paypalimage.png')}}" alt="" title="" style="width: 80%;">

                    </form>

                </div>
                <br>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/PvVScNeMfxw" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
                {{--<div class="row">--}}
                {{--<div class="box box-default">--}}
                {{--<div class="box-body">--}}
                {{--<div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">--}}
                {{--To be filled--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="col-md-6">
                {{--<img src="{{asset('/images/5099.png')}}" alt="" title="" style="width: 80%;">--}}
                {{--<div style="border-style: solid;border-color: #0f0f0f">--}}
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/1Iq6WJzrRdk" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <br/><h6><b>MEMBERSHIP MAESTRO DEL FITNESS </b></h6>
                <br/><h4>Accesso a un pannello personalizzato.</h4>
                <br/><h4>Pacchetti di allenamento Completi.</h4>
                <br/><h4>Diversi livelli di intensità per ogni Workout.</h4>
                <br/><h4>WorkoutIdeati, Studiati, Pensati da Maestro del Fitness per<b>
                        farti ottenere risultati migliori, Stimolarti con diversi tipi di allenamento.
                    </b>
                </h4>
                <br/><h4><b>Basta allenamenti ripetitivi con Maestro del Fitness ti migliori giorno per giorno con
                        differenti tipologie di Workout</b>, questo è molto altro all’interno del nostro servizio di
                    abboanmento.
                </h4>
                <br/><br/><h4><b>Non esiste un programma di allenamento che possa andare bene per tutti.</b></h4>
                <p>Per questo abbiamo creato Maestro del Fitness!
                    Programmi di allenamento ben strutturati finalizzati al miglioramento costante della vostra forma
                    fisica.
                    Video Tutorial, Articoli mirati al benessere, Una community incentrata sul Fitness.
                    Maestro del Fitness è mix efficace di elementi. Passione, Varietà, Complessitae Completezza.
                    Il servizio in Abbonamento si contraddistingue per la sua completezza.
                    Avrai accesso al 100% dei nostri contenuti, tutorial, Programmi di allenamento e molto altro.
                </p>
                <br/><br/><h4>Il Fitness è un modo sano e Naturale di riprendere il controllo del proprio benessere
                    Psicofisico!
                </h4>
                <br/><br/><h4>Dopo la sottoscrizione alla nostra Community avrai accesso a tutti i nostri contenuti fino
                    a che lo vorrai!
                </h4>
                <p>&#9660;Compila il Form fino in fondo per procedere all’acquisto dei programmi!&#9660;</p>
                <h6><b>ECCO COSA RICEVI: </b></h6>
                <ul>
                    <li>Pacchetti di allenamento ideali per ogni momento o luogo. <br> Alcuni Esempi di Seguito:</li>
                    <li>-ALLENAMENTO IN CASA A CORPO LIBERO</li>
                    <li>-ALLENAMENTO OUTDOOR A CORPO LIBERO</li>
                    <li>-ALLENAMENTO OUTDOOR CON ATTREZZI</li>
                    <li>-ALLENAMENTO FUNCTIONAL IN PALESTRA</li>
                    <li>-ALLENAMENTO CON PESI IN PALESTRA (Unisex)</li>
                    <p>E tantissimi Altri disponibili, ne hai uno su richiesta in Particolare? Maestro del Fitness
                        potrebbe crearlo per te, scrivici a <a>info@maestrodelfitness.com</a></p>
                    <li>Un elenco di Programmi a tua disposizione da cui scegliere i tuoi preferiti</li>
                    <li>Programmi nuovi ogni mese!</li>
                    <li>Possibilità di richiedere un nuovo programma per la Community</li>
                    <li>Consigli sull’allenamento</li>
                    <li>Curiosità sul mondo del Fitness</li>
                    <li>Persone appassionate come te per confrontarti</li>
                    <li>Consigli sull'esecuzione degli esercizi</li>
                    <li>Video Tutorial dedicati.</li>
                    <li>Accesso ai nostri Gruppi su Facebookdove troverai altri contenuti Bonus e una community di
                        utenti come te appassionati di Fitness.
                    </li>
                    <li>Uno sconto su un eventuale acquisto futuro del Programma Personalizzato, richiedicelo.</li>
                </ul>
                <div class="box box-default">
                    <div class="box-body">
                        <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                            <h6><b><i class="icon fa fa-info"></i>Inizi Subito!</b></h6>
                            <p style="color:#928780;">
                            <ul>
                                <li>Dopo l'acquisto dovrai completare la registrazioneper accedere al nostro portale e
                                    selezionare dall’elenco gli allenamenti che preferisci. Disponibili per te svariati
                                    Programmi e tantissimi contenuti.
                                </li>
                                <li>Entra a far parte della nostra community!</li>
                                <li>Potrai inoltre compilare il nostro questionario grazie al quale se in futuro vorrai
                                    potrai acquistare il tuo Personalizzato che verrà ideato in sole 48 ore.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-default">
                    <div class="box-body">
                        <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                            <h6><b><i class="icon fa fa-info"></i>Accesso per tutta la durata della tua Membership.
                                    Aggiornamenti inclusi.</b></h6>
                            <p style="color:#928780;">
                            <ul>
                                <li>Avrai sempre Accesso ai Programmi Creati da Maestro del Fitness.</li>
                                <li>Paga in modo 100% sicuro tramite Paypal, con il tuo account paypal o utilizzando la
                                    tua carta di credito.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-default">
                    <div class="box-body">
                        <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                            <h6><b><i class="icon fa fa-info"></i>Hai Bisogno di aiuto?</b></h6>
                            <p style="color:#928780;">
                            <ul>
                                <li>Mandaci una Mail.<br>Il nostro Staff ti risponderà il prima possibile per qualsiasi
                                    dubbio o chiarimento.
                                </li>
                                <li>Siamo sempre attivi anche sui nostri canali Social.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-body">
                        <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                            <h6><b><i class="icon fa fa-info"></i>Vuoi pagare con bonifico?</b></h6>
                            <p style="color:#928780;">Scrivici <a
                                        href="mailto:info@maestrodelfitness.com">info@maestrodelfitness.com</a></p>
                        </div>


                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!--<div class="col-md-2"></div>-->
            <!--<h3 class="form-signin-heading">Second Box</h3>-->
            <div style="background: #f6f6f6; color: black;">
                <!--<h3>DISCLAIMER TEXT:</h3>-->
                <p>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250"
                             height="250" alt="Logo"/>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <br>COPYRIGHT <br>
                Questo Programma Personalizzato, sistema online, dominio, contenuti ed il materiale in esso contenuto
                possono costituire opere dell’ingegno e pertanto possono essere tutelati dalla legge sul diritto
                d’autore. La violazione dei diritti in essa previsti può quindi comportare l’applicazione delle sanzioni
                penali o amministrative previste dagli art. 171, 171-bis, 171-ter, 174-bis e 174-ter della legge 22
                aprile 1941, n. 633, oltre alle sanzioni civili previste dal codice civile italiano.
                Le opere delle quali viene indicata la fonte sono di proprietà esclusiva dei rispettivi <a>titolari </a>
                dei diritti e dei loro aventi causa. Ove non diversamente indicato, tutti i diritti appartengono in via
                esclusiva a Maestrodelfitness.com.
                Il materiale contenuto in questo Programma non può pertanto essere riprodotto, con qualsiasi mezzo
                analogico o digitale, in modo diretto o indiretto, temporaneamente o permanentemente, in tutto o in
                parte, senza l’autorizzazione scritta di Maestrodelfitness.com o dei rispettivi <a
                        href="http://www.maestrodelfitness.com/5/5.html"> titolari </a>
                Tutti i marchi, registrati e non, e altri segni distintivi presenti nel Programma personalizzato
                appartengono ai legittimi proprietari e non sono concessi in licenza né in alcun modo fatti oggetto di
                disposizione, salvo espressamente indicato. È fatto in particolare divieto di utilizzare il logo, le
                immagini e la grafica di maestrodelfitness, senza il preventivo consenso scritto di Maestrodelfitness.
                In ogni caso chi intende utilizzare i nostri contenuti, avviare una collaborazione, partecipare al
                lavoro della pagina può farne richiesta per email scrivendo a: <a> info@maestrodelfitness.com </a>
                Ulteriori dettagli riguardanti i termini del servizio sono consultabili <a
                        href="http://www.maestrodelfitness.com/5/5.html">cliccando qui</a>

                <br>AVVERTENZE:<br>
                Tutte le informazioni contenute nel seguente programma non intendono sostituirsi in alcun modo al parere
                di medici professionisti. E/o specialisti del settore. L'allenamento con sovraccarichi può causare
                infortuni, si consiglia pertanto di eseguire esercizi prestando la massima attenzione utilizzando
                soltanto metodologie e carichi adatti al proprio livello di preparazione. L'autore
                (Maestrodelfitness.com) è sollevato da ogni tipo di responsabilità in merito all'utilizzo improprio
                delle informazioni trasmesse dal seguente sito web www.maestrodelfitness.com. In caso di bisogno o
                dubbio consultare il parere di un medico prima di intraprendere qualsiasi tipo di attività fisica o
                programma alimentare. </p>
            </div>
            <!--<div class="col-md-2"></div>-->
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
