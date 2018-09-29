@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white">
                <div class="x_content" style="background-color: white">

                    <form action="{{route('admin.ads.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">NOME<span class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Name" name="name"  required autofocus>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Url<span class="star">*</span></label>
                            </div>


                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control" placeholder="Url" name="url"   autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <label for="file">Photo</label>
                                <input type="file" name="photo" required/>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-sm btn btn-block" name="Submit" value="Invia" type="Submit" >Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection