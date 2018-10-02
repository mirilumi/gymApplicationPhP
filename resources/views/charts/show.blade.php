@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white">
                <div class="x_content" style="background-color: white">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Peso</th>
                            <th>Chili Persi</th>
                            <th>Chili Presi</th>
                            <th>GIROCOSCIA</th>
                            <th>GIROVITA</th>
                            <th>FIANCHI</th>
                            <th>CIRCONFERENZA TORACIA</th>
                        </tr>
                            <tr>
                                <td>
                                    <a href=" {!! url('chart/peso/'.$user->id) !!}" class="btn btn-dark">Peso</a>
                                </td>
                                <td>
                                    <a href=" {!! url('chart/persi/'.$user->id) !!}" class="btn btn-dark">Chili Persi</a>
                                </td>
                                <td>
                                    <a href=" {!! url('chart/presi/'.$user->id) !!}" class="btn btn-dark">Chili Presi</a>
                                </td>
                                <td>
                                    <a href=" {!! url('chart/girocoscia/'.$user->id) !!}" class="btn btn-dark">GIROCOSCIA</a>
                                </td>
                                <td>
                                    <a href=" {!! url('chart/girovita/'.$user->id) !!}" class="btn btn-dark">GIROVITA</a>
                                </td>
                                <td>
                                    <a href=" {!! url('chart/fianchi/'.$user->id) !!}" class="btn btn-dark">FIANCHI</a>
                                </td>
                                <td>
                                    <a href=" {!! url('chart/cft/'.$user->id) !!}" class="btn btn-dark">CIRCONFERENZA TORACIA</a>
                                </td>
                            </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection