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
                            <th>Url</th>
                            <th>Edit</th>
                            {{--<th>Delete</th>--}}
                        </tr>
                            @foreach ($ads as $ad)
                                <tr>
                                    <td>{{$ad->name}}</td>
                                    <td>{{$ad->url}}</td>
                                    <td>
                                        <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/ads/'.$ad->id) !!}'" value="Edit">
                                    </td>
                                    {{--<td>--}}
                                        {{--<input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/ads/'.$ad->id) !!}'" value="DELETE">--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach

                    </table>
                    <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('admin/ads/create') !!}'" value="ADD">
                </div>
            </div>
        </div>
    </div>
@endsection