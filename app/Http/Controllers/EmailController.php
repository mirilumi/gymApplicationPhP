<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\SecondBox;
use App\ThirdBoxTable;
use App\User;
use App\UserProgramme;
use App\UserTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        return view('emails.help',array('user'=>$user,'userTables'=>$userTables,'secondBoxTables'=>$secondBoxTables,'thirdBoxTables'=>$thirdBoxTables,'userProgrammes'=>$programmes));
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
        $user = User::find(Auth::user()->id);
        $data = array('name'=>$user->name, "body" => $request->message);
        Mail::send('emails.email', $data, function($message) {
            $message->to('carlo@maestrodelfitness.com', 'Help Desk')
                ->cc(['carlo@maestrodelfitness.com','stefano@maestrodelfitness.com'])
                ->subject('Problem In system ');
            $message->from('support@maestrodelfitnessapp.maestrodelfitness.com','Admin');
        });
        return redirect('/fitnessUser');
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
