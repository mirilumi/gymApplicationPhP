<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\Questionnare;
use App\SecondBox;
use App\SecondBoxDefault;
use App\ThirdBoxTable;
use App\ThirdBoxTableDefault;
use App\User;
use App\UserProgramme;
use App\UserTable;
use App\UserTableDefault;
use App\UserTableMapping;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        foreach ($users as $user){
        $questionnares[$user->id] = Questionnare::where('email',$user->email)->first();
        }
        return view('users.show', array('users' => $users,'questionnares'=>$questionnares));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function userQuestionare($id)
    {
        $user = User::find($id);
        $questionnare = Questionnare::where('email',$user->email)->first();
        if($questionnare == null){
            $questionnare = new Questionnare();
        }
        return view('users.adminQuestionnare',array('questionnare'=>$questionnare,'user'=>$user));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $userTables = UserTable::where('user_id', $id)->get();
        $secondBoxTables = SecondBox::where('user_id', $id)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->get();
        return view('users.page',array('user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function see($id)
    {
        $users = User::all();
        $programmes = [];
        foreach ($users as $user){
            $programmes[$user->id] = UserProgramme::where('user_id',$user->id)->where('programme_id',$id)->first();
        }
        foreach ($users as $user){
            $questionnares[$user->id] = Questionnare::where('email',$user->email)->first();
        }
        $program = DefaultProgram::find($id);
        return view('users.programme', array('users' => $users,'programmes'=>$programmes,'questionnares'=>$questionnares,'program'=>$program));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @param  int  $programmeId
     * @return Response
     */
    public function addOrRemove($userId,$programmeId)
    {
        $usersProgramme = UserProgramme::where('user_id',$userId)->where('programme_id',$programmeId)->first();
        if($usersProgramme){
            UserProgramme::destroy($usersProgramme->id);
        }else{
            $usersProgramme = new UserProgramme();
            $usersProgramme->user_id = $userId;
            $usersProgramme->programme_id = $programmeId;
            $usersProgramme->save();
        }
        return redirect('/admin/user/programme/'.$programmeId);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user->active = !$user->active;
        $user->save();
        return redirect('admin/user/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function preview($id){
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
        $userProgrammes = UserProgramme::where('user_id',$id)->get();
        foreach ($userProgrammes as $userProgramme){
            $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
        }
        return view('defaultProgram.preview',array('userTables'=>$userTables,'defaultProgram'=>$defaultProgram,'thirdBoxTable'=>$thirdBoxTable,'secondBoxTable'=>$secondBoxTable,'userProgrammes'=>$programmes));

    }

}
