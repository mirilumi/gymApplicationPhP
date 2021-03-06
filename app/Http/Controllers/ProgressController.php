<?php

namespace App\Http\Controllers;

use App\ChilePersi;
use App\ChilePresi;
use App\CirconferenzaToracia;
use App\DefaultProgram;
use App\Fianchi;
use App\Girocoscia;
use App\Girovita;
use App\Peso;
use App\Progress;
use App\Questionnare;
use App\User;
use App\UserProgramme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('progress.index',['users'=>$users]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_to_redirect = $id;
        if($id == 0){
            $id = auth()->user()->id;
            $id_to_redirect = 0;
        }
        $user = User::find($id);
        $questionnare = Questionnare::where('email',$user->email)->first();
        $progress = Progress::where('user_id',$user->id)->first();
        if(!$questionnare){
            $questionnare = new Questionnare();
        }
        if(!$progress){
            $progress = new Progress();
        }
        $peso = Peso::where('questionare_id',$questionnare->id)->get();
        $chilePersi = ChilePersi::where('questionare_id',$questionnare->id)->get();
        $chilePresi = ChilePresi::where('questionare_id',$questionnare->id)->get();
        $girocoscia = Girocoscia::where('questionare_id',$questionnare->id)->get();
        $girovita = Girovita::where('questionare_id',$questionnare->id)->get();
        $fianchi = Fianchi::where('questionare_id',$questionnare->id)->get();
        $cft = CirconferenzaToracia::where('questionare_id',$questionnare->id)->get();
        if($id_to_redirect == 0){
            $user = User::find($id);
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('progress.users.show',['user'=>$user,'peso'=>$peso,'girocoscia'=>$girocoscia,'girovita'=>$girovita,'fianchi'=>$fianchi,'cft'=>$cft,'persi'=>$chilePersi,'presi'=>$chilePresi,'questionnare'=>$questionnare,'progress'=>$progress,'userProgrammes'=>$programmes]);
        }else{
            return view('progress.show',['user'=>$user,'peso'=>$peso,'persi'=>$chilePersi,'girocoscia'=>$girocoscia,'girovita'=>$girovita,'fianchi'=>$fianchi,'cft'=>$cft,'presi'=>$chilePresi,'questionnare'=>$questionnare,'progress'=>$progress]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProgress($id)
    {
        $id_to_redirect = $id;
        if($id == 0){
            $id = auth()->user()->id;
            $id_to_redirect = 0;
        }
        $user = User::find($id);
        $questionnare = Questionnare::where('email',$user->email)->first();
        $progress = Progress::where('user_id',$user->id)->first();
        if(!$questionnare){
            $questionnare = new Questionnare();
        }
        if(!$progress){
            $progress = new Progress();
        }
        $peso = Peso::where('questionare_id',$questionnare->id)->get();
        $chilePersi = ChilePersi::where('questionare_id',$questionnare->id)->get();
        $chilePresi = ChilePresi::where('questionare_id',$questionnare->id)->get();
        $girocoscia = Girocoscia::where('questionare_id',$questionnare->id)->get();
        $girovita = Girovita::where('questionare_id',$questionnare->id)->get();
        $fianchi = Fianchi::where('questionare_id',$questionnare->id)->get();
        $cft = CirconferenzaToracia::where('questionare_id',$questionnare->id)->get();
        if($id_to_redirect == 0){
            $user = User::find($id);
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('progress.users.edit',['user'=>$user,'peso'=>$peso,'persi'=>$chilePersi,'girocoscia'=>$girocoscia,'girovita'=>$girovita,'fianchi'=>$fianchi,'cft'=>$cft,'presi'=>$chilePresi,'questionnare'=>$questionnare,'progress'=>$progress,'userProgrammes'=>$programmes]);
        }else{
            return view('progress.edit',['user'=>$user,'peso'=>$peso,'persi'=>$chilePersi,'girocoscia'=>$girocoscia,'girovita'=>$girovita,'fianchi'=>$fianchi,'cft'=>$cft,'presi'=>$chilePresi,'questionnare'=>$questionnare,'progress'=>$progress]);
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
        $id_to_redirect = $id;
        if($id == 0){
            $id = auth()->user()->id;
            $id_to_redirect = 0;
        }
        $progress = Progress::where('user_id',$id)->first();
        $questionare = Questionnare::where('email',User::find($id)->email)->first();
        if (!$progress){
            $progress = new Progress();
            $progress->user_id = $id;
        }
        if (!$questionare){
            $questionare = new Questionnare();
        }
        $questionare->name = $request->name;
        $questionare->cognome = $request->cognome;
        $questionare->sesso = $request->sesso;
        $questionare->email = User::find($id)->email;
        $questionare->save();
        if($request->hasfile('first_photo'))
        {
            $file = $request->file('first_photo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().$id.'.'.$extension;
            File::delete(public_path('img/').$progress->first_photo);
            $file->move(public_path('img/'), $filename);
            $progress->first_photo = $filename;
        }
        if($request->hasfile('second_photo')) {
            $file = $request->file('second_photo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . $id . '.' . $extension;
            File::delete(public_path('img/') . $progress->first_photo);
            $file->move(public_path('img/'), $filename);
            $progress->second_photo = $filename;
        }
//        $progress->girovita = $request->girovita;
//        $progress->girocoscia = $request->girocoscia;
//        $progress->fianchi = $request->fianchi;
//        $progress->circonferenza_toracica = $request->circonferenza_toracica;
        if($request->note != '')
        $progress->note = $request->note;
        $progress->save();
        return redirect('/edit/progress/'.$id_to_redirect);
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
