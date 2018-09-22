@extends('layouts.userLayout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <form action="{{route('changePassword')}}" method="POST" >
                                    @csrf
                                    <div class="form-group row">
                                        <label for="old" class="col-md-4 col-form-label text-md-right">VECCHIA PASSWORD<span class="star">*</span></label>

                                        <div class="col-md-6">
                                            <input id="old" type="password" class="form-control" placeholder="VECCHIA PASSWORD " name="old"  required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirm" class="col-md-4 col-form-label text-md-right">NUOVA PASSWORD<span class="star">*</span></label>
                                        <div class="col-md-6">
                                            <input id="confirm" type="password" class="form-control" placeholder="NUOVA PASSWORD " name="confirm"  required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="new" class="col-md-4 col-form-label text-md-right">CONFERMA PASSWORD<span class="star">*</span></label>
                                        <div class="col-md-6">
                                            <input id="new" type="password" class="form-control" placeholder="CONFERMA PASSWORD" name="new"  required autofocus>
                                        </div>
                                    </div>
                                    @if($error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endif
                                    <button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit" >Invia</button>
                                </form>
                            </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection