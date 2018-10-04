@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white;color: black">
                <div class="x_content" style="background-color: white;color: black">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>DISPLAY</th>
                            <th>Modifica</th>
                            <th>Users</th>
                            <th>Delete</th>
                        </tr>

                        @foreach ($defaultPrograms as $defaultProgram)
                            <tr>
                                <td>{{$defaultProgram->name}}</td>
                                <td>
                                    <a href=" {!! url('admin/user/default/programme/'.$defaultProgram->id) !!}" class="btn btn-dark">Display</a>
                                </td>
                                <td>
                                    <a href=" {!! url('admin/defaultProgramm/'.$defaultProgram->id) !!}" class="btn btn-dark">Modifica</a>
                                </td>
                                <td>
                                    <a href=" {!! url('admin/user/programme/'.$defaultProgram->id) !!}" class="btn btn-dark">Users</a>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/user/programme/delete/'.$defaultProgram->id) !!}'" value="DELETE">
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection