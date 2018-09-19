<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\User;
use App\UserProgramme;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        if($user->is_admin){
            return view('profile.indexAdmin',['user'=>$user,'userProgrammes'=>$programmes]);
        }else{
            $user = User::find(auth()->id());
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('profile.indexUser',['user'=>$user,'userProgrammes'=>$programmes]);
        }
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
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->cognome = $request->cognome;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->indirizzio = $request->indirizzio;
        $user->save();
        if($user->is_admin){
            return view('profile.showAdmin',['user'=>$user]);
        }else{
            $user = User::find(auth()->id());
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('profile.showUser',['user'=>$user,'userProgrammes'=>$programmes]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(auth()->id());
        if($user->is_admin){
            return view('profile.showAdmin',['user'=>$user]);
        }else{
            $user = User::find(auth()->id());
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('profile.showUser',['user'=>$user,'userProgrammes'=>$programmes]);
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
        //
    }
}
