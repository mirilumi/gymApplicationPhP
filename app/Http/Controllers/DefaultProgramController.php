<?php

namespace App\Http\Controllers;

use App\BlankPage;
use App\DefaultProgram;
use App\SecondBox;
use App\SecondBoxDefault;
use App\ThirdBoxTable;
use App\ThirdBoxTableDefault;
use App\User;
use App\UserTable;
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
     * $param int $id
     * @return \Illuminate\Http\Response
     */
    public function replicate($id)
    {
        $user = User::find($id);
        return view('defaultProgram.replicate',array('user'=>$user));
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
        if (DefaultProgram::where('name',$request->name)->first())
        return redirect()->back()->with("error","Another Default program exist with this name. Please try with another name.");
        $defaultProgram = DefaultProgram::create($request->all());
        return redirect('admin/defaultProgramm/'.$defaultProgram->id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $user_id = $request->user_id;
        $thirdBoxTable = ThirdBoxTable::where('user_id',$user_id)->first();
        $secondBoxTable = SecondBox::where('user_id',$user_id)->first();
        $userTables = UserTable::where('user_id',$user_id)->get();
        $defaultProgram = new DefaultProgram();
        $defaultProgram->name = $request->name;
        if($secondBoxTable)
        $defaultProgram->second_box_id = $secondBoxTable->id;
        if($thirdBoxTable)
        $defaultProgram->third_box_id = $thirdBoxTable->id;
        $defaultProgram->save();
        foreach ($userTables as $userTable){
            $userTablesDefault = new UserTableDefault();
            $userTablesDefault->muscolo = $userTable->muscolo;
            $userTablesDefault->esercizio = $userTable->esercizio;
            $userTablesDefault->serie = $userTable->serie;
            $userTablesDefault->repetizioni = $userTable->repetizioni;
            $userTablesDefault->recupero = $userTable->recupero;
            $userTablesDefault->note = $userTable->note;
            $userTablesDefault->save();
            $userTableMapping = new UserTableMapping();
            $userTableMapping->user_table_id = $userTablesDefault->id;
            $userTableMapping->default_program_id = $defaultProgram->id;
            $userTableMapping->save();
        }
        return redirect('/admin/user');
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
        if($defaultProgram->is_blank){
            $blankPage = BlankPage::where('default_program_id',$defaultProgram->id)->first();
            return view('defaultProgram.blank.defaultProgramEdit',array('blankPage'=>$blankPage,'defaultProgram'=>$defaultProgram,'thirdBoxTable'=>$thirdBoxTable,'secondBoxTable'=>$secondBoxTable));
        }else{
            $userTables = [];
            $userTableMappings = UserTableMapping::where('default_program_id', $defaultProgram->id)->get();
            foreach ($userTableMappings as $userTableMapping){
                $userTables[] = UserTableDefault::find($userTableMapping->user_table_id);
            }
            return view('defaultProgram.defaultProgramEdit',array('userTables'=>$userTables,'defaultProgram'=>$defaultProgram,'thirdBoxTable'=>$thirdBoxTable,'secondBoxTable'=>$secondBoxTable));
        }

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

    }

    public function delete($id){
        $secondBox = DefaultProgram::find($id);
        DefaultProgram::destroy($id);
        return redirect('/admin/defaultProgram/see');
    }

}
