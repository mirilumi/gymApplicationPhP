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
        if ($id != 0) {
            $user = User::find($id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }else{

            $user = User::find(Auth::user()->id);
            $questionare = Questionnare::where('email', $user->email)->first();
        }
        $visitor = DB::select('SELECT * from (select pesos.peso as peso,0 as chile_persi,0 as chile_presi, created_at from pesos where questionare_id = ?
UNION ALL
select 0 as peso, chile_persis.chile_persi as chile_persi,0 as chile_presi,created_at from chile_persis where questionare_id = ?
UNION ALL
select 0 as peso,0 as chile_persi,chile_presis.chile_presi as chile_presi,created_at from chile_presis where questionare_id = ? ) t  ', [$questionare->id, $questionare->id, $questionare->id]);


        $result[] = ['created_at', 'peso', 'chile_persi', 'chile_presi'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->created_at, (int)$value->peso, (int)$value->chile_persi, (int)$value->chile_presi];
        }

        return view('charts.index')
            ->with('visitor', json_encode($result));
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
        $visitor = DB::select('SELECT * from (select pesos.peso as peso,0 as chile_persi,0 as chile_presi, created_at from pesos where questionare_id = ?
UNION ALL
select 0 as peso, chile_persis.chile_persi as chile_persi,0 as chile_presi,created_at from chile_persis where questionare_id = ?
UNION ALL
select 0 as peso,0 as chile_persi,chile_presis.chile_presi as chile_presi,created_at from chile_presis where questionare_id = ? ) t  ', [$questionare->id, $questionare->id, $questionare->id]);


        $result[] = ['created_at', 'peso', 'chile_persi', 'chile_presi'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->created_at, (int)$value->peso, (int)$value->chile_persi, (int)$value->chile_presi];
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
