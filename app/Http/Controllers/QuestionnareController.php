<?php

namespace App\Http\Controllers;

use App\Questionnare;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;


class QuestionnareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questionnare.questionnare');
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
        $questionnare = User::where('email', $request->email)->get();
        if($questionnare == null){
            return redirect()->back();
        }
        Questionnare::create($request->all());
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $questionnare = Questionnare::findOrFail($id);
        $input = $request->all();

        $questionnare->fill($input)->save();
        return redirect('myQuestionnare');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createQuestionare(Request $request)
    {
        $questionnare = Questionnare::findOrFail($request->get('user_id'));
        $input = $request->all();

        $questionnare->fill($input)->save();
        return redirect('myQuestionnare');
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
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required',
            'name' => 'required',
            'cognome' => 'required',
            'sixth_question' => 'required',
            'seventh_question' => 'required',
            'ten_question' => 'required',
            'eta' => 'required',
        ]);
    }
}
