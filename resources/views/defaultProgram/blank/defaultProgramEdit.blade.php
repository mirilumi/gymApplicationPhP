@extends('layouts.layoutSummerNote')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content" style="background-color: white;color: black">
                    {{--<h3 class="form-signin-heading">PROGRAMMA</h3>--}}
                    {{--<p>--}}
                    {{--<p>TRX METABOLIC CIRCUIT<br>#1</p>--}}
                    {{--<p>CIRCUIT:</p>--}}
                    {{--<ul>--}}
                        {{--<li>squat</li>--}}
                        {{--<li>pull up</li>--}}
                        {{--<li>lunge back gamba dx</li>--}}
                        {{--<li>lunge back gamba sx</li>--}}
                        {{--<li>ice skaters</li>--}}
                        {{--<li>bridge</li>--}}
                        {{--<li>atomic Crunch</li>--}}
                    {{--</ul>--}}
                    {{--<p>--}}
                        {{--SETTIMANA 1-2: Recupero tra gli esercizi: 10 secondi<br>--}}
                        {{--Primo giro: eseguire 20 ripetizioni di ogni esercizio<br>--}}
                        {{--Secondo giro : eseguire 15 ripetizioni<br>--}}
                        {{--Terzo giro: 10 ripetizioni<br>--}}
                        {{--Recupero alla fine di ogni giro: 1 minuto<br>--}}
                    {{--</p>--}}
                    {{--<p>--}}
                        {{--SETTIMANA 3-4: recupero tra gli es 10 secondi<br>--}}
                        {{--Primo giro: 20 ripetizioni<br>--}}
                        {{--Secondo giro: 15<br>--}}
                        {{--Terzo giro: 10<br>--}}
                        {{--Quarto giro: 20<br>--}}
                        {{--Recupero alla fine di ogni giro : 1 minuto--}}
                    {{--</p>--}}
                    @if($blankPage!= null)
                        <form  action="{!! url('admin/blankPage/'.$blankPage->id.'/blankPageEdit/'.$defaultProgram->id) !!}" method="POST" class="form-signin">
                            @csrf
                            <h1 class="form-signin-heading">PROGRAMMA</h1>
                            <br/>
                            <textarea  placeholder="Description"
                                       id="description1" name="description" class="summernote" >{!! $blankPage->description !!}</textarea> <br />
                            <button class="btn btn-sm btn btn-block" name="Submit" value="Save" type="Submit" >Save</button>
                        </form>
                    @else
                        <form  action="{!! url('admin/blankPageStore/'.$defaultProgram->id) !!}" method="POST" class="form-signin">
                            @csrf
                            <h1 class="form-signin-heading">PROGRAMMA</h1>
                            <br/>
                            <textarea  placeholder="Description"
                                       id="description1" name="description" class="summernote" ></textarea> <br />
                            <button class="btn btn-sm btn btn-block" name="Submit" value="Save" type="Submit" >Save</button>
                        </form>
                    @endif
                    @if($secondBoxTable->id != null)
                        <form  action="{!! url('admin/secondBoxDefault/'.$secondBoxTable->id.'/secondBoxDefaultEdit/'.$defaultProgram->id) !!}" method="POST" class="form-signin">
                            @csrf
                            <h1 class="form-signin-heading">Online Coach</h1>
                            <br/>
                            <input name="id" type="hidden" value="{{$secondBoxTable->id}}"/>
                            <input type="text" value="{{$secondBoxTable->title}}"  placeholder="Title"
                                   id="title1" name="title" class="form-control" /> <br />
                            <textarea  placeholder="Description"
                                       id="description1" name="description" class="form-control" >{{$secondBoxTable->description}}</textarea> <br />

                            <button class="btn btn-sm btn btn-block" name="Submit" value="Save" type="Submit" >Save</button>
                        </form>
                    @else
                        <form  action="{!! url('admin/secondBoxDefaultStore/'.$defaultProgram->id) !!}" method="POST" class="form-signin">
                            @csrf
                            <h1 class="form-signin-heading">Online Coach</h1>
                            <br/>

                            <input type="text"   placeholder="Title"
                                   id="title1" name="title" class="form-control" /> <br />
                            <textarea  placeholder="Description"
                                       id="description1" name="description" class="form-control" ></textarea> <br />

                            <button class="btn btn-sm btn btn-block" name="Submit" value="Save" type="Submit" >Save</button>
                        </form>
                    @endif
                    <div class="row">
                        <h1 class="form-signin-heading">Online Coach</h1>
                        <br/>
                        <div class="col-md-12">
                            @if(isset($thirdBoxTable->image))
                                <img  src="{{asset('img/').'/'.$thirdBoxTable->image}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />
                            @endif
                            <br>
                            <br>
                            @if(!isset($thirdBoxTable->description))
                                <form  action="{!! url('admin/thirdBoxDefaultStore/'.$defaultProgram->id) !!}" method="POST" class="form-signin" enctype="multipart/form-data">
                                    @csrf
                                    <textarea   placeholder="Description"
                                                id="description1" name="description" class="form-control" ></textarea> <br />
                                    <input type="file" name="file" /><br/><br/>
                                    <input type="submit" class="btn btn-sm btn btn-block"  value="Save" />
                                </form>
                            @else
                                <form  action="{!! url('admin/thirdBoxDefault/'.$thirdBoxTable->id.'/thirdBoxDefaultEdit/'.$defaultProgram->id) !!}" method="POST" class="form-signin" enctype="multipart/form-data">
                                    @csrf
                                    <textarea   placeholder="Description"
                                                id="description1" name="description" class="form-control" >{{$thirdBoxTable->description}}</textarea> <br />
                                    <input type="file" name="file" /><br/><br/>
                                    <input type="submit" class="btn btn-sm btn btn-block"  value="Save" />
                                </form>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection