@extends('layouts.login_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />
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
                        <h1>Acquista ora il tuo Programma</h1><br>
                    </div>
                    <form action="{{route('pay')}}" method="POST" >
                        @csrf
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">NOME<span class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder=" La tua Email" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">COGNOME</label>

                            <div class="col-md-6">
                                <input id="cognome" type="text" class="form-control{{ $errors->has('cognome') ? ' is-invalid' : '' }}" placeholder="Cognome" name="cognome"autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address<span class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="La tua Email" name="email"  required>

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
                                <input id="telefono" type="number" class="form-control" placeholder="Telefono" name="telefono"  required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">INDIRIZZO</label>

                            <div class="col-md-6">
                                <input id="indirizzio" type="text" class="form-control" placeholder="Indirizzio" name="indirizzio" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label for="amount" class="col-md-12 col-form-label">Scegli il tuo programma</label>

                                <select id="amount" name="amount" class="form-control">
                                    <option value="39.99">MDF Programma Personalizzato Basic 39.99 </option>
                                    <option value="69.99">MDF Programma Personalizzato Pro 69.99</option>
                                    <option value="99.99">MDF Programma Personalizzato Plus 99.99</option>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required="required">
                                Ho preso visione e accetto tutti i Termini e le condizioni visuliazzabili alla seguente <a href="http://www.maestrodelfitness.com/5/5.html">Pagina</a>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input class="btn btn-sm btn btn-block" src="{{asset('/images/paypalbutton.jpeg')}}" name="Submit" value="Pay" type="image" />
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                                <img src="{{asset('/images/paypalimage.png')}}" alt="" title="" style="width: 80%;">

                    </form>
                </div>
                @for($i = 0;$i<count($ads)-1; $i++)
                    <br>
                <div class="row">
                            <div class="col-md-3"></div>
                                <div style="background: #f6f6f6; color: black;">
                                    <a href="{{$ads[$i+1]->url}}">
                                       <img src="{{asset('img/').'/'.$ads[$i+1]->photo}}"  class="img-responsive center-block" alt="Logo" width="300" height="250" />
                                    </a>
                                </div>
                </div>
                @endfor
            </div>
            <div class="col-md-6">
                    {{--<img src="{{asset('/images/5099.png')}}" alt="" title="" style="width: 80%;">--}}
                    {{--<div style="border-style: solid;border-color: #0f0f0f">--}}
                        <a type="button" class="btn-default" href="">Here Will placed the link</a>
                    {{--</div>--}}
                    <br/><br/><h6><b>PROGRAMMA PERSONALIZZATO DI ALLENAMENTO MAESTRO DEL FITNESS</b></h6>
                    <br/><br/><h4><b>MAESTRO DEL FITNESS® <br> Il Percorso di allenamento Online per raggiungere i tuoi obiettivi!</b></h4> <div class="box box-default">
                    <div class="box-body">
                        <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                            <p style="color:#928780;">Attraverso questo servizio di coachingone-to-one, Maestro del Fitness® provvederà a crearti un programma di allenamento personalizzato , ti darà la motivazione necessaria per raggiungere i tuoi obiettivi, e ti darà consigli su uno stile di vita sano e attivo.
                                Accedendo al tuo account Dedicato MaestroDelFitness® ti sarà possibile controllare, ovunque e in qualsiasi momento, il tuo programma di allenamento o scaricarlo in PDF e averlo sempre sui tuoi dispositivi.
                            </p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <br/><br/><h4><b>Affidati al nostro Piano di allenamenti!</b></h4>
                <p>INIZIA UN PROGRAMMA SU MISURA PER TE
                    Non esiste un programma di allenamento che possa andare bene per tutti. Per questo Maestro del Fitness® ne crea uno adatto al tuo livello, in base ai tuoi obiettivi e alle attrezzature di cui disponi.
                    Ti forniremo gli allenamenti giusti, nei giorni giusti, con il recupero giusto per
                    farti ottenere risultati migliori. Il programma che si adatta alle tue esigenze.
                    Affidati al nostro Piano di allenamenti!
                    NESSUN ABBONAMENTO MENSILE. PAGHI SOLO UNA VOLTA. Riceverai un accesso dedicato al tuo programma dopo esserti registrato al sistema aver compilato il tuo Questionario, i tuoi progressi e il tuo programma saranno sempre disponibili, potrai inoltre aggiungere altri programmi acquistando ancora.
                </p>
                    <p>&#9660;Compila il Form fino in fondo per procedere all’acquisto delprogramma!&#9660;</p>
                    <h6><b>ECCO COSA RICEVI: </b></h6>
                    <ul>
                        <li>Un percorso di Online Coaching Personalizzato </li>
                        <li>Consigli sull’allenamento</li>
                        <li>Consigli sull'esecuzione degli esercizi</li>
                        <li>Video Tutorial dedicati.</li>
                        <li>Accesso ai nostri Gruppi su Facebookdove troverai altri contenuti Bonus e una community di utenti come te appassionati di Fitness. </li>
                        <li>Assistenza live per tutta la durata del tuo Percorso..</li>
                    </ul>
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                                <h6><b><i class="icon fa fa-info"></i>Inizi Subito!</b></h6>
                                <p style="color:#928780;">Dopo l'acquisto potrai registrarti e accedere al nostro portale e compilare il nostro questionario grazie al quale creeremo il tuo Personalizzato in sole 48 ore!</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                                <h6><b><i class="icon fa fa-info"></i>Nessun abbonamento o costo extra.</b></h6>
                                <p style="color:#928780;">Per questo programma pagherai una volta sola senza avere abbonamenti o costi fissi mensili "nascosti"! Qualora non fossi sicuro del tuo acquisto, il programma richiede qualche giorno per essere creato quindi hai tutto il tempo per richiedere il Rimborso completo.</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                                <h6><b><i class="icon fa fa-info"></i>Accesso per Sempre. Aggiornamenti inclusi.</b></h6>
                                <p style="color:#928780;">Dalla consegna del programma potrai iniziare quando vuoi e avrai ACCESSO PER SEMPRE al programma acquistato.
                                    Paga in modo 100% sicuro tramite Paypal, con il tuo account paypal o utilizzando la tua carta di credito.
                                </p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                                    <h6><b><i class="icon fa fa-info"></i>Hai Bisogno di aiuto?</b></h6>
                                    <p style="color:#928780;">Mandaci una Mail.
                                        Il nostro Staff ti risponderà il prima possibile per qualsiasi dubbio o chiarimento.
                                        Siamo sempre attivi anche sui nostri canali Social.
                                    </p>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="alert alert-info alert-dismissible" style="background: #f6f6f6; color: black;">
                                        <h6><b><i class="icon fa fa-info"></i>Vuoi pagare con bonifico?</b></h6>
                                        <p style="color:#928780;">Scrivici <a href="mailto:info@maestrodelfitness.com">info@maestrodelfitness.com</a></p>
                                    </div>



                                </div>
                                <!-- /.box-body -->
                            </div>
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

                <br>AVVERTENZE:<br>
                Tutte le informazioni contenute nel seguente programma non intendono sostituirsi in alcun modo al parere di medici professionisti. E/o specialisti del settore. L'allenamento con sovraccarichi può causare infortuni, si consiglia pertanto di eseguire esercizi prestando la massima attenzione utilizzando soltanto metodologie e carichi adatti al proprio livello di preparazione. L'autore (Maestrodelfitness.com) è sollevato da ogni tipo di responsabilità in merito all'utilizzo improprio delle informazioni trasmesse dal seguente sito web www.maestrodelfitness.com. In caso di bisogno o dubbio consultare il parere di un medico prima di intraprendere qualsiasi tipo di attività fisica o programma alimentare. </p>
            </div>
            <!--<div class="col-md-2"></div>-->
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
