@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <form action="{{route('email.store')}}" method="POST" id="myForm">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Message<span class="star">*</span></label>
                                <textarea id="message" class="form-control" name="message"  placeholder="Enter your message here" required autofocus></textarea>
                            </div>
                        </div>
                        <button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit" >Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection