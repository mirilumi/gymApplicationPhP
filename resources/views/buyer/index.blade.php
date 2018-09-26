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
                            <th>Acquisti</th>
                            <th>IP</th>
                            <th>Date</th>
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a href=" {!! url('admin/buyer/'.$user->id) !!}" class="btn btn-dark">{{$user->purchase}}</a>
                                    </td>
                                    <td>{{$user->ip}}</td>
                                    <td>{{$user->date_purchase->format('d/m/Y H:m:s')}}</td>
                            </tr>
                        @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection