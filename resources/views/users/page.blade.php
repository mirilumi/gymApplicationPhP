@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="title_left">
            <a  href=" {!! url('admin/user/preview/'.$user->id) !!}" class="btn btn-sm btn" >Preview</a></td>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                        <table id="datatable" class="table table-striped table-bordered">
                            <tr>
                                <th>MUSCOLO</th>
                                <th>ESERCIZIO</th>
                                <th>SERIE</th>
                                <th>RIPETIZIONI</th>
                                <th>RECUPERO</th>
                                <th>NOTE</th>
                                <th>ACTION</th>
                                <!--<th>DELETE</th>-->
                            </tr>
                            @foreach($userTables as $userTable)
                                <tr >
                                <td>{{$userTable->muscolo}}</td>
                                <td>{{$userTable->esercizio}}</td>
                                <td>{{$userTable->serie}}</td>
                                <td>{{$userTable->repetizioni}}</td>
                                <td>{{$userTable->recupero}}</td>
                                <td>{{$userTable->note}}</td>
                                <td>
                                    <input type="button" class="btn btn-sm btn btn-block"  onclick="location.href = ' {!! url('/admin/usersTable/delete/'.$userTable->id) !!}'" value="DELETE">
                                </td>
                                </tr>
                            @endforeach
                            <tr>
                                <form action="{{route('admin.usersTable.store')}}" method="POST" >
                                    @csrf
                                    <td><input name="muscolo" type="text"/></td>
                                    <td><input name="esercizio" type="text"/></td>
                                    <td><input name="serie" type="text"/></td>
                                    <td><input name="repetizioni" type="text"/></td>
                                    <td><input name="recupero" type="text"/></td>
                                    <td><input name="note" type="text"/></td>
                                    <input name="user_id" type="hidden" value="{{$user->id}}"/>
                                    <td><input  type="Submit" class="btn btn-sm btn btn-block"  value="Save"/></td>
                                </form>
                            </tr>


                        </table>
                        @if(isset($secondBoxTables[0]->title) && isset($secondBoxTables[0]->description))
                        <form  action="{!! url('admin/secondBox/'.$secondBoxTables[0]->id.'/edit') !!}" method="GET" class="form-signin">
                            @csrf
                            <h1 class="form-signin-heading">Online Coach</h1>
                            <br/>
                            <input name="id" type="hidden" value="{{$secondBoxTables[0]->id}}"/>

                            <input name="user_id" type="hidden" value="{{$user->id}}"/>
                            <input type="text" value="{{$secondBoxTables[0]->title}}"  placeholder="Title"
                                   id="title1" name="title" class="form-control" /> <br />
                            <textarea  placeholder="Description"
                                       id="description1" name="description" class="form-control" >{{$secondBoxTables[0]->description}}</textarea> <br />

                            <button class="btn btn-sm btn btn-block" name="Submit" value="Save" type="Submit" >Save</button>
                        </form>
                            @else
                            <form  action="{{route('admin.secondBox.store')}}" method="POST" class="form-signin">
                                @csrf
                                <h1 class="form-signin-heading">Online Coach</h1>
                                <br/>

                                <input name="user_id" type="hidden" value="{{$user->id}}"/>
                                <input type="text"   placeholder="Title"
                                       id="title1" name="title" class="form-control" /> <br />
                                <textarea  placeholder="Description"
                                           id="description1" name="description" class="form-control" ></textarea> <br />

                                <button class="btn btn-sm btn btn-block" name="Submit" value="Save" type="Submit" >Save</button>
                            </form>
                            @endif
                        <div class="row">
                            <h1 class="form-signin-heading">Online Coach</h1>
                            <br/>
                            <div class="col-md-12">
                                @if(isset($thirdBoxTables[0]->image))
                                <img  src="{{asset('img/').'/'.$thirdBoxTables[0]->image}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />
                                @endif
                                <br>
                                    <br>
                                    @if(!isset($thirdBoxTables[0]->description))
                                        <form  action="{{route('admin.thirdBox.store')}}" method="POST" class="form-signin" enctype="multipart/form-data">
                                        @csrf
                                        <textarea   placeholder="Description"
                                        id="description1" name="description" class="form-control" ></textarea> <br />
                                        <input type="file" name="file" /><br/><br/>
                                        <input name="user_id" type="hidden" value="{{$user->id}}"/>
                                        <input type="submit" class="btn btn-sm btn btn-block"  value="Save" />
                                     </form>
                                    @else
                                        <form  action="{!! url('admin/thirdBox/'.$thirdBoxTables[0]->id.'/thirdBoxEdit') !!}" method="POST" class="form-signin" enctype="multipart/form-data">
                                            @csrf
                                            <textarea   placeholder="Description"
                                                        id="description1" name="description" class="form-control" >{{$thirdBoxTables[0]->description}}</textarea> <br />
                                            <input type="file" name="file" /><br/><br/>
                                            <input name="user_id" type="hidden" value="{{$user->id}}"/>
                                            <input type="submit" class="btn btn-sm btn btn-block"  value="Save" />
                                        </form>
                                        @endif
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
@endsection