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
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Session;
class FitnessUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
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
        if(count($userTables) > 0 && count($thirdBoxTables) > 0 && count($secondBoxTables)) {
            return view('users.fitnessUser', array('user' => $user,'generatePdf'=>1, 'userTables' => $userTables, 'secondBoxTables' => $secondBoxTables, 'thirdBoxTables' => $thirdBoxTables, 'userProgrammes' => $programmes));
        }else{
            return view('homeUser', array('user' => $user, 'userTables' => $userTables, 'secondBoxTables' => $secondBoxTables, 'thirdBoxTables' => $thirdBoxTables, 'userProgrammes' => $programmes));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @param int $page_nr
     * @return Response
     */
    public function userPages($page_nr)
    {
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $userTables = UserTable::where('user_id', $id)->where('page_nr',$page_nr)->get();
        $secondBoxTables = SecondBox::where('user_id', $id)->where('page_nr',$page_nr)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->where('page_nr',$page_nr)->get();
        $userProgrammes = UserProgramme::where('user_id',$id)->get();
        $programmes = [];
        foreach ($userProgrammes as $userProgramme){
            $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
        }
        if(count($userTables) > 0 && count($thirdBoxTables) > 0 && count($secondBoxTables) > 0) {
            return view('users.fitnessUser',array('user'=>$user,'page_nr'=>$page_nr,'generatePdf'=>1,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes));
        }

            return view('nonProgram',array('user'=>$user,'page_nr'=>$page_nr,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes));
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
     * Show the form for creating a new resource.
     * @param int $page_nr
     * @return Response
     */
    public function pdfGenerate($page_nr)
    {
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $userTables = UserTable::where('user_id', $id)->where('page_nr',$page_nr)->get();
        $secondBoxTables = SecondBox::where('user_id', $id)->where('page_nr',$page_nr)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->where('page_nr',$page_nr)->get();
        $userProgrammes = UserProgramme::where('user_id',$id)->get();
        $programmes = [];
        foreach ($userProgrammes as $userProgramme){
            $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
        }
        $data = [
            'user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes
        ];
        $pdf = PDF::loadView('users.download',$data);
        $pdf->download('program.pdf');
        die();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function myQuestionare()
    {
        $questionnare = Questionnare::where('email',Auth::user()->email)->first();
        if($questionnare == null){
            $questionnare = new Questionnare();
        }
        $user = User::find(Auth::user()->id);
        $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
        $programmes = [];
        foreach ($userProgrammes as $userProgramme){
            $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
        }
        return view('users.questionare',array('questionnare'=>$questionnare,'user'=>$user,'userProgrammes'=>$programmes));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id,Request $request)
    {

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
    public function preview($id){

    }
    public function defaultProgramme($id){
        $user = User::find($id);
        $userTables = UserTable::where('user_id', $id)->get();
        $secondBoxTables = SecondBox::where('user_id', $id)->get();
        $thirdBoxTables = ThirdBoxTable::where('user_id', $id)->get();
        return view('users.preview',array('user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables));
    }
}
