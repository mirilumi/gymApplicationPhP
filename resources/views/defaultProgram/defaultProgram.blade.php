@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white;color: black">
                <div class="x_content" style="background-color: white;color: black">

                    <form action="{{route('admin.defaultProgramm.store')}}" method="POST" >
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">NOME<span class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Name" name="name"  required autofocus>
                            </div>
                            <div class="col-md-2">

                                <input id="default" type="radio" name="is_blank" value="0" required>Default Page<br>
                                <input id="blank" type="radio" name="is_blank" value="1">Blank Page<br>
                            </div>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit" >Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection