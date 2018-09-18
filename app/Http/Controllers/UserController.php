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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * Store a newly created resource in storage.
     * @return int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editQuestionare($id,Request $request)
    {

        $questionare = Questionnare::where('email',User::where('id',$id)->first()->email)->first();
        $questionare->email = $request->email;
        $questionare->name = $request->name;
        $questionare->cognome = $request->cognome;
        $questionare->altezza = $request->altezza;
        $questionare->peso = $request->peso;
        $questionare->allenato = $request->allenato;
        $questionare->struttura_programma = $request->struttura_programma;
        $questionare->durata_allenamento = $request->durata_allenamento;
        $questionare->first_question = $request->first_question;
        $questionare->second_question = $request->second_question;
        $questionare->third_question = $request->third_question;
        $questionare->forth_question = $request->forth_question;
        $questionare->fifth_question = $request->fifth_question;
        $questionare->sixth_question = $request->sixth_question;
        $questionare->seventh_question = $request->seventh_question;
        $questionare->eighth_question = $request->eighth_question;
        $questionare->ninth_question = $request->ninth_question;
        $questionare->ten_question = $request->ten_question;
        $questionare->eta = $request->eta;
        $questionare->save();
        return redirect('/admin/userQuestionare/'.$id);

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
     * @param  int  $pageId
     * @return Response
     */
    public function show3($id,$pageId)
    {
        $user = User::find($id);
        $userTables = UserTable::where('user_id', $id)->where('page_nr',$pageId)->get();
        $secondBoxTables = SecondBox::where('user_id', $id)->where('page_nr',$pageId)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->where('page_nr',$pageId)->get();
        return view('users.page',array('user'=>$user,'page_nr'=>$pageId,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @param  int  $id
     * @param  int  $page_nr
     * @return Response
     */
    public function replicate($userId,$id,$page_nr)
    {
        $user = User::find($userId);
        $userTables = UserTable::where('user_id', $userId)->where('page_nr',$page_nr)->get();
        $secondBoxTables = SecondBox::where('user_id', $userId)->where('page_nr',$page_nr)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $userId)->where('page_nr',$page_nr)->get();
        $replicatable = UserTable::find($id);
        return view('users.replicate',array('user'=>$user,'page_nr'=>$page_nr,'userTables'=>$userTables,'replicatable'=>$replicatable,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables));
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
        return redirect()->back();
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
     * @param  int  $page_nr
     * @return Response
     */
    public function preview($id){
        $defaultProgram = DefaultProgram::find($id);
        $userTables = [];
        $programmes = [];
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function makeAdmin($id){
        $user = User::find($id);
        $user->is_admin = !$user->is_admin;
        $user->save();
        return redirect('admin/user');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function resetPassword($id){
        $user = User::find($id);
        $user->password = Hash::make($user->email);
        $user->save();
        return redirect('admin/user');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function changePassowrdIndex(){
        $error = null;
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $userTables = UserTable::where('user_id', $id)->get();
        $secondBoxTables = SecondBox::where('user_id', $id)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->get();
        $userProgrammes = UserProgramme::where('user_id',$id)->get();
        $programmes = [];
        foreach ($userProgrammes as $userProgramme){
            $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
        }
        return view('users.change_password',array('error'=>$error,'user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function changePassowrd(Request $request){
        $error = null;
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $userTables = UserTable::where('user_id', $id)->get();
        $secondBoxTables = SecondBox::where('user_id', $id)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->get();
        $userProgrammes = UserProgramme::where('user_id',$id)->get();
        $programmes = [];
        foreach ($userProgrammes as $userProgramme){
            $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
        }
        if($request->new != $request->confirm){
           $error = " Password does not match";
           return view('users.change_password',array('error'=>$error,'user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes));
        }else
            if(!(Hash::check($request->get('old'), Auth::user()->password))){
            $error = " Old Password is not correct";
            return view('users.change_password',array('error'=>$error,'user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes));
        }else{
            $user->password = Hash::make($request->new);
            $user->save();
            return redirect('/fitnessUser');
        }


        //        $user = User::find(Auth::user()->id);
//        $id = $user->id;
//        $userTables = UserTable::where('user_id', $id)->get();
//        $secondBoxTables = SecondBox::where('user_id', $id)->get();
//        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->get();
//        $userProgrammes = UserProgramme::where('user_id',$id)->get();
//        $programmes = [];
//        foreach ($userProgrammes as $userProgramme){
//            $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
//        }
//        return view('users.change_password',array('user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminPreview($id){
        $defaultProgram = DefaultProgram::find($id);
        $userTables = [];
        $programmes = [];
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
        return view('defaultProgram.adminPreview',array('userTables'=>$userTables,'defaultProgram'=>$defaultProgram,'thirdBoxTable'=>$thirdBoxTable,'secondBoxTable'=>$secondBoxTable,'userProgrammes'=>$programmes));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        User::destroy($id);
        return redirect('/admin/user');
    }
}
