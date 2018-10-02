<?php

namespace App\Http\Controllers;

use App\CirconferenzaToracia;
use App\Questionnare;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CirconferenzaToraciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cft = CirconferenzaToracia::create($request->all());
        $cft->date = date('Y-m-d');
        $cft->save();
        if(Auth::user()->is_admin == 1){
            $questionare = Questionnare::find($cft->questionare_id);
            $user = User::where('email',$questionare->email)->first();
            return redirect('/edit/progress/'.$user->id);
        }
        return redirect('/edit/progress/0');
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
        $cft = CirconferenzaToracia::find($id);
        $cft->circonferenza_toracia = $request->circonferenza_toracia;
        $cft->date = $request->date;
        $cft->save();
        if(Auth::user()->is_admin == 1){
            $questionare = Questionnare::find($cft->questionare_id);
            $user = User::where('email',$questionare->email)->first();
            return redirect('/edit/progress/'.$user->id);
        }
        return redirect('edit/progress/0');
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
