<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\SecondBoxDefault;
use App\ThirdBoxTableDefault;
use App\UserTableDefault;
use App\UserTableMapping;
use Illuminate\Http\Request;

class DefaultProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('defaultProgram.defaultProgram');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function see()
    {
        $defaultsPrograms = DefaultProgram::all();
        return view('defaultProgram.list', array('defaultPrograms' => $defaultsPrograms));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $defaultProgram = DefaultProgram::create($request->all());
        return redirect('admin/defaultProgramm/'.$defaultProgram->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $defaultProgram = DefaultProgram::find($id);
        $userTables = [];
        $userTableMappings = UserTableMapping::where('default_program_id', $defaultProgram->id)->get();
        foreach ($userTableMappings as $userTableMapping){
            $userTables[] = UserTableDefault::find($userTableMapping->user_table_id);
        }
        if($defaultProgram->third_box_id != null){
            $thirdBoxTable = ThirdBoxTableDefault::where('id', $defaultProgram->third_box_id)->first();
        }else{
            $thirdBoxTable = new ThirdBoxTableDefault();
        }
        if($defaultProgram->second_box_id != null){
            $secondBoxTable = SecondBoxDefault::where('id', $defaultProgram->second_box_id)->first();

        }else{
            $secondBoxTable = new SecondBoxDefault();
        }
        return view('defaultProgram.defaultProgramEdit',array('userTables'=>$userTables,'defaultProgram'=>$defaultProgram,'thirdBoxTable'=>$thirdBoxTable,'secondBoxTable'=>$secondBoxTable));

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
