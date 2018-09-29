@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white">
                <div class="x_content" style="background-color: white">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Action</th>
                            <th>Approved</th>
                            <th>Lista Programmi</th>
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>

                                {{--<td th:text="${user.getEmail()}"></td>--}}
                                <td>
                                    <a href=" {!! url('admin/user/'.$user->id) !!}" class="btn btn-dark">Crea Pagina</a>
                                </td>
                                @if($user->active == 1)
                                    <td>
                                        <a href=" {!! url('admin/user/'.$user->id.'/edit') !!}" class="btn btn-dark">Disattiva</a>
                                    </td>
                                @else
                                    <td>
                                        <a href=" {!! url('admin/user/'.$user->id.'/edit') !!}" class="btn btn-dark">Attiva</a>
                                    </td>
                                @endif
                                    @if($programmes[$user->id])
                                        <td>
                                            <a href=" {!! url('admin/user/addOrRemove/'.$user->id.'/programme/'.$program->id) !!}" class="btn btn-dark">Remove</a>
                                        </td>
                                    @else
                                        <td>
                                            <a href=" {!! url('admin/user/addOrRemove/'.$user->id.'/programme/'.$program->id) !!}" class="btn btn-dark">Aggiungi</a>
                                        </td>
                                    @endif
                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection