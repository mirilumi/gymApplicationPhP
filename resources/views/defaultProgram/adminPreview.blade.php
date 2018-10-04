@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white;color: black">
                <div class="x_content" style="background-color: white">
                   <h1>{{$defaultProgram->name}}</h1>
                    @if(count($userTables)>0)
                        <table id="datatable" class="table table-striped table-bordered">
                            <tr>
                                <th>MUSCOLO</th>
                                <th>ESERCIZIO</th>
                                <th>SERIE</th>
                                <th>RIPETIZIONI</th>
                                <th>RECUPERO</th>
                                <th>NOTE</th>
                            </tr>
                            @foreach($userTables as $userTable)
                                <tr >
                                    <td>{{$userTable->muscolo}}</td>
                                    <td>{{$userTable->esercizio}}</td>
                                    <td>{{$userTable->serie}}</td>
                                    <td>{{$userTable->repetizioni}}</td>
                                    <td>{{$userTable->recupero}}</td>
                                    <td>{{$userTable->note}}</td>
                                </tr>
                            @endforeach


                        </table>
                    @endif
                    @if($secondBoxTable)
                        <div>
                            <h3>{{$secondBoxTable->title}}</h3>
                            <p>{{$secondBoxTable->description}}</p>
                        </div>
                    @endif
                    @if($thirdBoxTable)
                        <div class="row">
                            <h1 class="form-signin-heading">Online Coach</h1>
                            <br/>
                            @if(isset($thirdBoxTable->image))
                                <div class="col-md-6">

                                    <img src="{{asset('img/').'/'.$thirdBoxTable->image}}"  class="img-responsive center-block"alt="Logo" />
                                </div>
                            @endif
                            <br>
                            <br>
                            @if(isset($thirdBoxTable->description))
                                <div class="col-md-6">
                                    <h3 class="form-signin-heading">Descrizione</h3>
                                    <br/>
                                    <p>{{$thirdBoxTable->description}}</p> <br />
                                </div>
                            @endif
                        </div>
                </div>
                @endif
                @if($thirdBoxTable)
                    <div  class="row">
                        <!--<div class="col-md-2"></div>-->
                        <!--<h3 class="form-signin-heading">Second Box</h3>-->
                        <div style="background-color: white;color: black;" >
                            <!--<h3>DISCLAIMER TEXT:</h3>-->
                            <p>
                                <img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />
                                COPYRIGHT <br>
                                Questo Programma Personalizzato, sistema online, dominio, contenuti ed il materiale in esso contenuto possono costituire opere dell’ingegno e pertanto possono essere tutelati dalla legge sul diritto d’autore. La violazione dei diritti in essa previsti può quindi comportare l’applicazione delle sanzioni penali o amministrative previste dagli art. 171, 171-bis, 171-ter, 174-bis e 174-ter della legge 22 aprile 1941, n. 633, oltre alle sanzioni civili previste dal codice civile italiano.
                                Le opere delle quali viene indicata la fonte sono di proprietà esclusiva dei rispettivi <a>titolari </a> dei diritti e dei loro aventi causa. Ove non diversamente indicato, tutti i diritti appartengono in via esclusiva a Maestrodelfitness.com.
                                Il materiale contenuto in questo Programma non può pertanto essere riprodotto, con qualsiasi mezzo analogico o digitale, in modo diretto o indiretto, temporaneamente o permanentemente, in tutto o in parte, senza l’autorizzazione scritta di Maestrodelfitness.com o dei rispettivi <a href="http://www.maestrodelfitness.com/5/5.html"> titolari </a>
                                Tutti i marchi, registrati e non, e altri segni distintivi presenti nel Programma personalizzato appartengono ai legittimi proprietari e non sono concessi in licenza né in alcun modo fatti oggetto di disposizione, salvo espressamente indicato. È fatto in particolare divieto di utilizzare il logo, le immagini e la grafica di maestrodelfitness, senza il preventivo consenso scritto di Maestrodelfitness.
                                In ogni caso chi intende utilizzare i nostri contenuti, avviare una collaborazione, partecipare al lavoro della pagina può farne richiesta per email scrivendo a: <a> info@maestrodelfitness.com </a>
                                Ulteriori dettagli riguardanti i termini del servizio sono consultabili <a href="http://www.maestrodelfitness.com/5/5.html">cliccando qui</a>
                            </p>
                                AVVERTENZE:
{{--                                <img src="{{asset('/images/white_image.png')}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />--}}
                                <p>Tutte le informazioni contenute nel seguente programma non intendono sostituirsi in alcun modo al parere di medici professionisti. E/o specialisti del settore. L'allenamento con sovraccarichi può causare infortuni, si consiglia pertanto di eseguire esercizi prestando la massima attenzione utilizzando soltanto metodologie e carichi adatti al proprio livello di preparazione. L'autore (Maestrodelfitness.com) è sollevato da ogni tipo di responsabilità in merito all'utilizzo improprio delle informazioni trasmesse dal seguente sito web www.maestrodelfitness.com. In caso di bisogno o dubbio consultare il parere di un medico prima di intraprendere qualsiasi tipo di attività fisica o programma alimentare. </p>
                        </div>
                        <!--<div class="col-md-2"></div>-->
                    </div>
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection