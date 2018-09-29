@extends('layouts.userLayout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white">
                <div class="x_content" style="background-color: white">

                    <form action="{{route('email.store')}}" method="POST" id="myForm">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Chiedi Aiuto<span class="star">*</span></label>
                                <textarea id="message" class="form-control" name="message"  placeholder="Scrivici il tuo messaggio per ricevere assistenza" required autofocus></textarea>
                            </div>
                        </div>
                        <button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit" >Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection