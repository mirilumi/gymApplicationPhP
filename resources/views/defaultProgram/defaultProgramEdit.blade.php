@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="background-color: white">
                <div class="x_content" style="background-color: white">
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
                                <form action="{!! url('admin/userTableDefaultStore/'.$defaultProgram->id) !!}" method="POST" >
                                    @csrf
                                    <td><input name="muscolo" type="text"/></td>
                                    <td><input name="esercizio" type="text"/></td>
                                    <td><input name="serie" type="text"/></td>
                                    <td><input name="repetizioni" type="text"/></td>
                                    <td><input name="recupero" type="text"/></td>
                                    <td><input name="note" type="text"/></td>
                                    <td><input  type="Submit" class="btn btn-sm btn btn-block"  value="Save"/></td>
                                </form>
                            </tr>


                        </table>
                        @if($secondBoxTable->id != null)
                        <form  action="{!! url('admin/secondBoxDefault/'.$secondBoxTable->id.'/secondBoxDefaultEdit/'.$defaultProgram->id) !!}" method="POST" class="form-signin">
                                @csrf
                                <h1 class="form-signin-heading">Online Coach</h1>
                                <br/>
                                <input name="id" type="hidden" value="{{$secondBoxTable->id}}"/>
                                <input type="text" value="{{$secondBoxTable->title}}"  placeholder="Title"
                                       id="title1" name="title" class="form-control" /> <br />
                                <textarea  placeholder="Description"
                                           id="description1" name="description" class="form-control" >{{$secondBoxTable->description}}</textarea> <br />

                                <button class="btn btn-sm btn btn-block" name="Submit" value="Save" type="Submit" >Save</button>
                            </form>
                        @else
                            <form  action="{!! url('admin/secondBoxDefaultStore/'.$defaultProgram->id) !!}" method="POST" class="form-signin">
                                @csrf
                                <h1 class="form-signin-heading">Online Coach</h1>
                                <br/>

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
                                @if(isset($thirdBoxTable->image))
                                    <img  src="{{asset('img/').'/'.$thirdBoxTable->image}}" class="img-responsive center-block" width="250" height="250" alt="Logo" />
                                @endif
                                <br>
                                <br>
                                @if(!isset($thirdBoxTable->description))
                                    <form  action="{!! url('admin/thirdBoxDefaultStore/'.$defaultProgram->id) !!}" method="POST" class="form-signin" enctype="multipart/form-data">
                                        @csrf
                                        <textarea   placeholder="Description"
                                                    id="description1" name="description" class="form-control" ></textarea> <br />
                                        <input type="file" name="file" /><br/><br/>
                                        <input type="submit" class="btn btn-sm btn btn-block"  value="Save" />
                                    </form>
                                @else
                                    <form  action="{!! url('admin/thirdBoxDefault/'.$thirdBoxTable->id.'/thirdBoxDefaultEdit/'.$defaultProgram->id) !!}" method="POST" class="form-signin" enctype="multipart/form-data">
                                        @csrf
                                        <textarea   placeholder="Description"
                                                    id="description1" name="description" class="form-control" >{{$thirdBoxTable->description}}</textarea> <br />
                                        <input type="file" name="file" /><br/><br/>
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