@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white;color: black">
                <div class="x_content" style="background-color: white;color: black">

                    <form action="{!! url('admin/ads/'.$ads->id) !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome<span class="star">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Name" name="name"  value="{{$ads->name}}" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Url<span class="star">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control" placeholder="Url" name="url" value="{{$ads->url}}"   autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <label for="file">Photo</label>
                                <input type="file" name="photo"/>
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