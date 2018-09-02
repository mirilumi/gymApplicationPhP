<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\SecondBoxDefault;
use App\ThirdBoxTableDefault;
use App\UserTableDefault;
use App\UserTableMapping;
use Illuminate\Http\Request;

class UserTableControllerDefault extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userTable = UserTableDefault::create($request->all());
        $defaultProgram = new DefaultProgram();
        $defaultProgram->user_table_id = $userTable->id;
        $defaultProgramToReturn = $defaultProgram->save();
        $thirdBoxTables = new ThirdBoxTableDefault();
        $secondBoxTables = new SecondBoxDefault();
        return view('defaultProgram.defaultProgramEdit',array('userTable'=>$userTable,'defaultProgram'=>$defaultProgramToReturn,'thirdBoxTables',$thirdBoxTables,'secondBoxTables',$secondBoxTables));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save($id,Request $request)
    {
        $userTable = UserTableDefault::create($request->all());
        $userTableMapping = new UserTableMapping();
        $userTableMapping->user_table_id = $userTable->id;
        $userTableMapping->default_program_id = $id;
        $userTableMapping = $userTableMapping->save();
        return redirect('/admin/defaultProgramm/'.$id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
