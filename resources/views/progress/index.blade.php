@extends('layouts.layout')

@section('content')
    <div class="row" style="background-color: white;color: black">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white;color: black">
                <div class="x_content" style="background-color: white;color: black">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            {{--<th>Cognome</th>--}}
                            <th>Progressi</th>
                            <th>Grafico</th>
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    <a href=" {!! url('progress/'.$user->id) !!}" class="btn btn-dark">Progressi</a>
                                </td>
                                <td>
                                    <a href=" {!! url('chart/'.$user->id) !!}" class="btn btn-dark">Vedi Grafico</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection