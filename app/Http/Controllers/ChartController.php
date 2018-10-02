<?php

namespace App\Http\Controllers;

use App\DefaultProgram;
use App\Questionnare;
use App\User;
use App\UserProgramme;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('charts.index');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.show',['userProgrammes'=>$programmes,'questionare'=>$questionare,'user'=>$user]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPeso($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::table('pesos')
            ->select(
                DB::raw("date as date"),
                DB::raw("AVG(peso) as peso"))->where("questionare_id",$questionare->id)
            ->orderBy("date")
            ->groupBy(DB::raw("date"))
            ->get();

        $result[] = ['date', 'peso'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->peso];
        }
        if($id == 0){
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.users.index',['visitor'=>json_encode($result),'userProgrammes'=>$programmes]);
        }else{
            return view('charts.index')
                ->with('visitor', json_encode($result));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPersi($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::table('chile_persis')
            ->select(
                DB::raw("date as date"),
                DB::raw("AVG(chile_persi) as chile_persi"))->where("questionare_id",$questionare->id)
            ->orderBy("date")
            ->groupBy(DB::raw("date"))
            ->get();

        $result[] = ['date', 'chile_persi'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->chile_persi];
        }
        if($id == 0){
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.users.index',['visitor'=>json_encode($result),'userProgrammes'=>$programmes]);
        }else{
            return view('charts.index')
                ->with('visitor', json_encode($result));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPresi($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::table('chile_presis')
            ->select(
                DB::raw("date as date"),
                DB::raw("AVG(chile_presi) as chile_presi"))->where("questionare_id",$questionare->id)
            ->orderBy("date")
            ->groupBy(DB::raw("date"))
            ->get();

        $result[] = ['date', 'chile_presi'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->chile_presi];
        }
        if($id == 0){
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.users.index',['visitor'=>json_encode($result),'userProgrammes'=>$programmes]);
        }else{
            return view('charts.index')
                ->with('visitor', json_encode($result));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFianchi($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::table('fianchis')
            ->select(
                DB::raw("date as date"),
                DB::raw("AVG(fianchi) as fianchi"))->where("questionare_id",$questionare->id)
            ->orderBy("date")
            ->groupBy(DB::raw("date"))
            ->get();

        $result[] = ['date', 'fianchi'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->fianchi];
        }
        if($id == 0){
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.users.index',['visitor'=>json_encode($result),'userProgrammes'=>$programmes]);
        }else{
            return view('charts.index')
                ->with('visitor', json_encode($result));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGirocoscia($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::table('girocoscias')
            ->select(
                DB::raw("date as date"),
                DB::raw("AVG(girocoscia) as girocoscias"))->where("questionare_id",$questionare->id)
            ->orderBy("date")
            ->groupBy(DB::raw("date"))
            ->get();

        $result[] = ['date', 'girocoscias'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->girocoscias];
        }
        if($id == 0){
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.users.index',['visitor'=>json_encode($result),'userProgrammes'=>$programmes]);
        }else{
            return view('charts.index')
                ->with('visitor', json_encode($result));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGirovita($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::table('girovitas')
            ->select(
                DB::raw("date as date"),
                DB::raw("AVG(girovita) as girovita"))->where("questionare_id",$questionare->id)
            ->orderBy("date")
            ->groupBy(DB::raw("date"))
            ->get();

        $result[] = ['date', 'girovita'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->girovita];
        }
        if($id == 0){
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.users.index',['visitor'=>json_encode($result),'userProgrammes'=>$programmes]);
        }else{
            return view('charts.index')
                ->with('visitor', json_encode($result));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCft($id)
    {
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::table('circonferenza_toracias')
            ->select(
                DB::raw("date as date"),
                DB::raw("AVG(circonferenza_toracia) as circonferenza_toracia"))->where("questionare_id",$questionare->id)
            ->orderBy("date")
            ->groupBy(DB::raw("date"))
            ->get();

        $result[] = ['date', 'circonferenza_toracia'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->date, (int)$value->circonferenza_toracia];
        }
        if($id == 0){
            $userProgrammes = UserProgramme::where('user_id',$user->id)->get();
            $programmes = [];
            foreach ($userProgrammes as $userProgramme){
                $programmes[] = DefaultProgram::where('id',$userProgramme->programme_id)->first();
            }
            return view('charts.users.index',['visitor'=>json_encode($result),'userProgrammes'=>$programmes]);
        }else{
            return view('charts.index')
                ->with('visitor', json_encode($result));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
