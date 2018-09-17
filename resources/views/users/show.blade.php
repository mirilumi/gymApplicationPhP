@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            {{--<th>Cognome</th>--}}
                            <th>Email</th>
                            <th>Action</th>
                            <th>Replica</th>
                            <th>Make Admin</th>
                            <th>Reset Password</th>
                            <th>Approved</th>
                            <th>Delete</th>
                        </tr>

                            @foreach ($users as $user)
                                <tr>
                                @if($questionnares[$user->id])
                                    <td><a class="btn btn-dark" href=" {!! url('admin/userQuestionare/'.$user->id) !!}">{{$user->name}}</a></td>
                                @else
                                    <td>{{$user->name}}</td>
                                @endif
                            <td>{{$user->email}}</td>

                            {{--<td th:text="${user.getEmail()}"></td>--}}
                            <td>
                                <a href=" {!! url('admin/user/'.$user->id.'/1') !!}" class="btn btn-dark">Crea Pagina 1</a>
                                <a href=" {!! url('admin/user/'.$user->id.'/2') !!}" class="btn btn-dark">Crea Pagina 2</a>
                                <a href=" {!! url('admin/user/'.$user->id.'/3') !!}" class="btn btn-dark">Crea Pagina 3</a>
                            </td>
                            <td>
                                <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/defaultProgram/replicate/'.$user->id) !!}'" value="Replica">
                            </td>
                            <td>
                                @if(!$user->is_admin)
                                <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/user/makeAdmin/'.$user->id) !!}'" value="Rendi Admin">
                                @else
                                    <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/user/makeAdmin/'.$user->id) !!}'" value="Rendi Utente">
                                @endif
                            </td>
                            <td>
                                <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/user/resetPassword/'.$user->id) !!}'" value="Reset Password">
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
                                    <td>
                                        <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/user/delete/'.$user->id) !!}'" value="DELETE">
                                    </td>
                                </tr>
                                    @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection