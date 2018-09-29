@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white">
                <div class="x_content" style="background-color: white">
                    <a href="{!! url('admin/buyer/csv/download') !!}" class="btn btn-dark float-right">Download CSV</a>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            {{--<th>Cognome</th>--}}
                            <th>Acquisti</th>
                            <th>IP</th>
                            <th>Date</th>
                            <th>Last Login</th>
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a href=" {!! url('admin/buyer/'.$user->id) !!}" class="btn btn-dark">{{$user->purchase}}</a>
                                    </td>
                                @if($user->ip != null)
                                    <td>{{$user->ip}}</td>
                                    @else
                                    <td></td>
                                @endif
                                    @if($user->date_purchase != null)
                                    <td>{{$user->date_purchase->format('d/m/Y H:m:s')}}</td>
                                @else
                                        <td></td>
                                @endif
                                @if($user->last_login != null)
                                    <td>{{$user->last_login->format('d/m/Y H:m:s')}}</td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection